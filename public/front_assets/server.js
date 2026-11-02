import { createServer } from "node:http";
import { access, readFile } from "node:fs/promises";
import { extname, join, normalize } from "node:path";
import { fileURLToPath } from "node:url";

const root = fileURLToPath(new URL(".", import.meta.url));
const projectRoot = join(root, "..", "..");

async function loadEnv() {
  try {
    const env = await readFile(join(projectRoot, ".env"), "utf8");
    for (const line of env.split(/\r?\n/)) {
      const trimmed = line.trim();
      if (!trimmed || trimmed.startsWith("#")) continue;

      const separator = trimmed.indexOf("=");
      if (separator === -1) continue;

      const key = trimmed.slice(0, separator).trim();
      const value = trimmed.slice(separator + 1).trim().replace(/^["']|["']$/g, "");
      if (key && !process.env[key]) process.env[key] = value;
    }
  } catch {
    // .env is optional; production hosts usually inject environment variables directly.
  }
}

await loadEnv();

// Hostinger Node Apps provide PORT automatically; local development can use CHATBOT_PORT.
const port = Number(process.env.PORT || process.env.CHATBOT_PORT || 3000);
const host = process.env.CHATBOT_HOST || "0.0.0.0";
const apiKey = process.env.GEMINI_API_KEY;
const model = process.env.GEMINI_MODEL || "gemini-2.5-flash";
const pdfPath = join(projectRoot, "public", "logo", "project.pdf");

let cachedPdf;

const mimeTypes = {
  ".html": "text/html; charset=utf-8",
  ".css": "text/css; charset=utf-8",
  ".js": "text/javascript; charset=utf-8",
  ".pdf": "application/pdf",
  ".png": "image/png",
  ".jpg": "image/jpeg",
  ".jpeg": "image/jpeg",
  ".svg": "image/svg+xml"
};

function sendJson(res, status, body) {
  res.writeHead(status, {
    "Content-Type": "application/json; charset=utf-8",
    "Access-Control-Allow-Origin": "*"
  });
  res.end(JSON.stringify(body));
}

async function readJson(req) {
  const chunks = [];
  for await (const chunk of req) chunks.push(chunk);
  const raw = Buffer.concat(chunks).toString("utf8");
  return raw ? JSON.parse(raw) : {};
}

async function getPdfBase64() {
  if (!cachedPdf) {
    try {
      await access(pdfPath);
    } catch {
      throw new Error(
        "The chatbot guide is not available yet. Add public/logo/project.pdf, then restart the chat server."
      );
    }
    cachedPdf = (await readFile(pdfPath)).toString("base64");
  }
  return cachedPdf;
}

function toGeminiHistory(messages = []) {
  return messages
    .slice(-8)
    .filter((message) => message && message.text && ["user", "assistant"].includes(message.role))
    .map((message) => ({
      role: message.role === "assistant" ? "model" : "user",
      parts: [{ text: String(message.text).slice(0, 6000) }]
    }));
}

async function answerQuestion(question, history) {
  if (!apiKey) {
    return {
      answer:
        "Gemini is not connected yet. Add your key as GEMINI_API_KEY, restart the server, then ask me about the PDF."
    };
  }

  const pdfData = await getPdfBase64();
  const contents = [
    ...toGeminiHistory(history),
    {
      role: "user",
      parts: [
        {
          text:
            "Use the attached PDF as the primary source. Answer clearly and briefly. If the answer is not in the PDF, say that you could not find it in the document.\n\nQuestion: " +
            question
        },
        {
          inline_data: {
            mime_type: "application/pdf",
            data: pdfData
          }
        }
      ]
    }
  ];

  let response;
  try {
    response = await fetch(
      `https://generativelanguage.googleapis.com/v1beta/models/${model}:generateContent?key=${apiKey}`,
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          systemInstruction: {
            parts: [
              {
                text:
                "You are a helpful PDF question-answering chatbot. Ground every answer in the provided PDF and do not invent details. Give clear, useful detail: begin with a short direct answer, then use Markdown bullet points for key facts or steps. Use **bold** for important labels. If the PDF does not contain the answer, say so plainly."
              }
            ]
          },
          contents,
          generationConfig: { temperature: 0.2, maxOutputTokens: 1200 }
        })
      }
    );
  } catch {
    throw new Error(
      "Cannot connect to the Gemini API. Check this server's internet connection, firewall, proxy, or DNS settings."
    );
  }

  const data = await response.json();
  if (!response.ok) {
    const message = data?.error?.message || "Gemini request failed.";
    throw new Error(message);
  }

  const answer =
    data?.candidates?.[0]?.content?.parts
      ?.map((part) => part.text || "")
      .join("")
      .trim() || "I could not generate an answer from the PDF.";

  return { answer };
}

async function serveStatic(req, res) {
  const url = new URL(req.url, `http://${req.headers.host}`);
  const requested = url.pathname === "/" ? "/index.html" : decodeURIComponent(url.pathname);
  const cleanPath = normalize(requested).replace(/^(\.\.[/\\])+/, "");
  const filePath = join(root, cleanPath);

  if (!filePath.startsWith(root)) {
    res.writeHead(403);
    res.end("Forbidden");
    return;
  }

  try {
    const content = await readFile(filePath);
    res.writeHead(200, {
      "Content-Type": mimeTypes[extname(filePath).toLowerCase()] || "application/octet-stream"
    });
    res.end(content);
  } catch {
    res.writeHead(404);
    res.end("Not found");
  }
}

const server = createServer(async (req, res) => {
  if (req.method === "OPTIONS") {
    res.writeHead(204, {
      "Access-Control-Allow-Origin": "*",
      "Access-Control-Allow-Methods": "GET,POST,OPTIONS",
      "Access-Control-Allow-Headers": "Content-Type"
    });
    res.end();
    return;
  }

  if (req.method === "GET" && req.url === "/api/health") {
    sendJson(res, 200, { ok: true, hasGeminiKey: Boolean(apiKey), model });
    return;
  }

  if (req.method === "POST" && req.url === "/api/chat") {
    try {
      const { question, history } = await readJson(req);
      const cleanQuestion = String(question || "").trim();

      if (!cleanQuestion) {
        sendJson(res, 400, { error: "Question is required." });
        return;
      }

      const result = await answerQuestion(cleanQuestion.slice(0, 4000), history);
      sendJson(res, 200, result);
    } catch (error) {
      sendJson(res, 500, { error: error.message || "Something went wrong." });
    }
    return;
  }

  if (req.method === "GET") {
    await serveStatic(req, res);
    return;
  }

  res.writeHead(405);
  res.end("Method not allowed");
});

server.listen(port, host, () => {
  console.log(`PDF chatbot running on ${host}:${port}`);
});

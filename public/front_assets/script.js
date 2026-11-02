const chatToggle = document.querySelector("#chatToggle");
const chatCard = document.querySelector("#chatCard");
const chatClose = document.querySelector("#chatClose");
const chatForm = document.querySelector("#chatForm");
const questionInput = document.querySelector("#questionInput");
const sendButton = document.querySelector("#sendButton");
const messagesEl = document.querySelector("#messages");
const chatStatus = document.querySelector("#chatStatus");
const suggestionButtons = document.querySelectorAll(".chat-chip");

if (!chatToggle || !chatCard || !chatClose || !chatForm || !questionInput || !sendButton || !messagesEl || !chatStatus) {
  // The shared file is safe to load on pages without the frontend chat widget.
} else {
const history = [];
const widgetApiBase = chatCard.dataset.apiBase;
const localApiBase = `${window.location.protocol}//${window.location.hostname}:3000`;
const isLocalSite = ["localhost", "127.0.0.1", "::1"].includes(window.location.hostname);
// On a normal Laravel/Hostinger deployment, use the same secure domain.
const productionFallback = window.location.origin;
const configuredApiBase = window.CHATBOT_API_BASE || widgetApiBase;
const legacyProxyUrl = `${window.location.origin}/chatbot-api`;
// Migrate older deployments away from the unavailable /chatbot-api proxy automatically.
const preferredApiBase = configuredApiBase && configuredApiBase.replace(/\/+$/, "") !== legacyProxyUrl
  ? configuredApiBase
  : (isLocalSite ? localApiBase : productionFallback);
let activeApiBase = preferredApiBase;

async function resolveApiBase() {
  const candidates = [...new Set([preferredApiBase, ...(isLocalSite ? [localApiBase] : [])].filter(Boolean))];

  for (const base of candidates) {
    try {
      const response = await fetch(`${base}/api/health`, { method: "GET" });
      const contentType = response.headers.get("content-type") || "";
      const data = contentType.includes("application/json")
        ? await response.json().catch(() => null)
        : null;

      if (response.ok && data && data.ok === true) {
        activeApiBase = base;
        chatStatus.textContent = "Liber AI is ready";
        return base;
      }
    } catch {
      // Keep trying the next candidate.
    }
  }

  activeApiBase = preferredApiBase;
  chatStatus.textContent = "Assistant is currently offline";
  return activeApiBase;
}

function setOpen(isOpen) {
  chatCard.classList.toggle("open", isOpen);
  chatCard.setAttribute("aria-hidden", String(!isOpen));
  chatToggle.setAttribute("aria-label", isOpen ? "Close Liber AI chat" : "Open Liber AI chat");
  chatToggle.setAttribute("aria-expanded", String(isOpen));
  if (isOpen) questionInput.focus();
}

function addMessage(role, text, isError = false) {
  const article = document.createElement("article");
  article.className = `message ${isError ? "error" : role}`;

  const meta = document.createElement("div");
  meta.className = "message-meta";

  const avatar = document.createElement("span");
  avatar.className = "message-avatar";
  avatar.textContent = role === "user" ? "You" : "AI";

  const label = document.createElement("span");
  label.className = "message-label";
  label.textContent = isError ? "Connection Notice" : role === "user" ? "Your Question" : "Liber Assistant";

  meta.append(avatar, label);

  const body = document.createElement("div");
  body.className = "message-body";
  renderMessageContent(body, text);

  article.append(meta, body);

  messagesEl.append(article);
  messagesEl.scrollTop = messagesEl.scrollHeight;
}

function appendInlineMarkdown(element, text) {
  const boldPattern = /\*\*(.+?)\*\*/g;
  let cursor = 0;
  let match;

  while ((match = boldPattern.exec(text)) !== null) {
    element.append(document.createTextNode(text.slice(cursor, match.index)));
    const strong = document.createElement("strong");
    strong.textContent = match[1];
    element.append(strong);
    cursor = match.index + match[0].length;
  }
  element.append(document.createTextNode(text.slice(cursor)));
}

function renderMessageContent(container, text) {
  let activeList = null;
  let activeListType = null;

  for (const sourceLine of String(text).split(/\r?\n/)) {
    const line = sourceLine.trim();
    const listMatch = line.match(/^(?:[-*]|(\d+)\.)\s+(.+)$/);

    if (listMatch) {
      const listType = listMatch[1] ? "ol" : "ul";
      if (!activeList || activeListType !== listType) {
        activeList = document.createElement(listType);
        activeListType = listType;
        container.append(activeList);
      }
      const item = document.createElement("li");
      appendInlineMarkdown(item, listMatch[2]);
      activeList.append(item);
      continue;
    }

    activeList = null;
    activeListType = null;
    if (!line) continue;

    const paragraph = document.createElement("p");
    appendInlineMarkdown(paragraph, line);
    container.append(paragraph);
  }
}

function setBusy(isBusy) {
  sendButton.disabled = isBusy;
  questionInput.disabled = isBusy;
  suggestionButtons.forEach((button) => {
    button.disabled = isBusy;
  });
  chatStatus.textContent = isBusy ? "Liber AI is thinking..." : "Liber AI is ready";
}

async function askGemini(question) {
  const apiBase = activeApiBase || (await resolveApiBase());
  let response;

  try {
    response = await fetch(`${apiBase}/api/chat`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ question, history })
    });
  } catch {
    throw new Error("Cannot reach the chat service at " + apiBase + ".");
  }

  const data = await response.json().catch(() => ({}));
  if (!response.ok) {
    throw new Error(
      data.error ||
        `Request failed. Make sure the PDF chat service is configured on ${apiBase}.`
    );
  }

  return data.answer;
}

chatToggle.addEventListener("click", () => {
  setOpen(!chatCard.classList.contains("open"));
});

chatClose.addEventListener("click", () => setOpen(false));

suggestionButtons.forEach((button) => {
  button.addEventListener("click", () => {
    questionInput.value = button.dataset.question || "";
    chatForm.requestSubmit();
  });
});

questionInput.addEventListener("keydown", (event) => {
  if (event.key === "Enter" && !event.shiftKey) {
    event.preventDefault();
    chatForm.requestSubmit();
  }
});

chatForm.addEventListener("submit", async (event) => {
  event.preventDefault();

  const question = questionInput.value.trim();
  if (!question) return;

  questionInput.value = "";
  addMessage("user", question);
  history.push({ role: "user", text: question });
  setBusy(true);

  try {
    const answer = await askGemini(question);
    addMessage("assistant", answer);
    history.push({ role: "assistant", text: answer });
  } catch (error) {
    addMessage("assistant", error.message || "Something went wrong.", true);
  } finally {
    setBusy(false);
    questionInput.focus();
  }
});

resolveApiBase();
}

# Hostinger deployment: Liber AI chatbot

The chatbot now has a Laravel same-domain API fallback. This is the recommended option for Hostinger because it does not require a public Node.js port or reverse proxy.

## Recommended: Laravel API (works on normal Hostinger PHP hosting)

Add these values to the Laravel website `.env`:

```env
GEMINI_API_KEY=your_real_gemini_key
GEMINI_MODEL=gemini-2.5-flash
CHATBOT_API_BASE=
```

Make sure `public/logo/project.pdf` is uploaded with the project, then run:

```bash
php artisan config:clear
php artisan view:clear
php artisan config:cache
```

Verify `https://your-domain.com/api/health`. The widget will automatically use `https://your-domain.com/api/chat`.

---

## Optional: separate Node.js chatbot app

Use this only if you specifically want to run `server.js` separately. Do not use `https://your-domain.com:3000`; Hostinger and browsers commonly block that port or do not provide TLS for it.

## 1. Create a chatbot subdomain

In Hostinger hPanel, create `chat.your-domain.com` and enable its SSL certificate.

## 2. Create the Node.js application

Deploy this same project, then create a Node.js app with:

- Application root: the project root
- Startup file: `public/front_assets/server.js`
- Node version: 18 or newer

Hostinger supplies `PORT` itself. Do not hard-code its value in hPanel.

## 3. Set environment variables

In the Node app environment, set:

```env
GEMINI_API_KEY=your_real_gemini_key
GEMINI_MODEL=gemini-2.5-flash
```

In the Laravel website `.env`, set:

```env
CHATBOT_API_BASE=https://chat.your-domain.com
```

Do not expose `GEMINI_API_KEY` in JavaScript or in a public file.

## 4. Restart and clear Laravel cache

Restart the Node.js app from hPanel. In the Laravel terminal, run:

```bash
php artisan config:clear
php artisan view:clear
php artisan config:cache
```

## 5. Verify

Open this URL in a browser:

```text
https://chat.your-domain.com/api/health
```

It should return JSON with `"ok":true` and `"hasGeminiKey":true`.

If your Hostinger plan has no Node.js Application feature, deploy the chatbot app to a Node-capable host/VPS and set `CHATBOT_API_BASE` to that app's HTTPS URL.

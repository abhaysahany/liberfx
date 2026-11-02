<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function health(): JsonResponse
    {
        return response()->json([
            'ok' => true,
            'hasGeminiKey' => filled(config('services.chatbot.gemini_key')),
            'model' => config('services.chatbot.gemini_model'),
        ]);
    }

    public function chat(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:4000'],
            'history' => ['nullable', 'array'],
            'history.*.role' => ['nullable', 'in:user,assistant'],
            'history.*.text' => ['nullable', 'string', 'max:6000'],
        ]);

        $apiKey = config('services.chatbot.gemini_key');
        if (blank($apiKey)) {
            return response()->json(['error' => 'Gemini is not configured on this server.'], 503);
        }

        $pdfPath = public_path('logo/project.pdf');
        if (! is_file($pdfPath)) {
            return response()->json(['error' => 'The chatbot guide PDF is not available.'], 503);
        }

        $history = collect($validated['history'] ?? [])
            ->filter(fn (array $message) => filled($message['text'] ?? null) && in_array($message['role'] ?? '', ['user', 'assistant'], true))
            ->take(-8)
            ->map(fn (array $message) => [
                'role' => $message['role'] === 'assistant' ? 'model' : 'user',
                'parts' => [['text' => mb_substr($message['text'], 0, 6000)]],
            ])
            ->values()
            ->all();

        $contents = [
            ...$history,
            [
                'role' => 'user',
                'parts' => [
                    [
                        'text' => 'Use the attached PDF as the primary source. Answer the following question: ' . $validated['question'],
                    ],
                    [
                        'inline_data' => [
                            'mime_type' => 'application/pdf',
                            'data' => base64_encode(file_get_contents($pdfPath)),
                        ],
                    ],
                ],
            ],
        ];

        try {
            $response = Http::acceptJson()
                ->timeout(75)
                ->post(
                    'https://generativelanguage.googleapis.com/v1beta/models/' . config('services.chatbot.gemini_model') . ':generateContent?key=' . urlencode($apiKey),
                    [
                        'systemInstruction' => [
                            'parts' => [[
                                'text' => 'You are a helpful PDF question-answering chatbot. Ground every answer in the provided PDF and do not invent details. Give a short direct answer, then use Markdown bullet points for useful details. Use **bold** for important labels. If the PDF does not contain the answer, say so plainly.',
                            ]],
                        ],
                        'contents' => $contents,
                        'generationConfig' => ['temperature' => 0.2, 'maxOutputTokens' => 1200],
                    ]
                );
        } catch (\Throwable) {
            return response()->json(['error' => 'Cannot connect to the Gemini API from this server.'], 502);
        }

        if ($response->failed()) {
            return response()->json([
                'error' => data_get($response->json(), 'error.message', 'Gemini could not complete this request.'),
            ], $response->status());
        }

        $answer = collect(data_get($response->json(), 'candidates.0.content.parts', []))
            ->pluck('text')
            ->filter()
            ->implode('');

        return response()->json(['answer' => $answer ?: 'I could not generate an answer from the guide.']);
    }
}

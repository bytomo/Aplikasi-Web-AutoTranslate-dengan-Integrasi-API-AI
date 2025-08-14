<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAITranslateService
{
    public function translate(string $text, string $from, string $to): array
    {
        // Normalisasi kode bahasa
        $from = strtolower(trim($from));
        $to   = strtolower(trim($to));
        if ($from === 'in') $from = 'id';
        if ($to === 'in')   $to   = 'id';

        // Kalau source dan target sama, langsung kembalikan teks asli
        if ($from === $to) {
            return [
                'translated_text' => $text,
                'provider'        => 'openai',
                'char_count'      => mb_strlen($text),
                'raw'             => ['note' => 'source == target, returned original']
            ];
        }

        // Prompt khusus agar OpenAI hanya mengembalikan terjemahan
        $prompt = "Translate the following text from {$from} to {$to}: {$text}";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type'  => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model'    => env('OPENAI_MODEL', 'gpt-4o-mini'), // Bisa diubah di .env
                'messages' => [
                    [
                        'role'    => 'system',
                        'content' => 'You are a translation engine that only replies with the translated text, without quotes or extra commentary.'
                    ],
                    [
                        'role'    => 'user',
                        'content' => $prompt
                    ]
                ],
                'temperature' => 0,
            ]);
        } catch (\Throwable $e) {
            throw new \RuntimeException('Tidak bisa menghubungi OpenAI: ' . $e->getMessage());
        }

        if (!$response->successful()) {
            $msg = $response->json('error.message') ?? $response->body();
            throw new \RuntimeException('OpenAI API error: ' . $msg);
        }

        $data = $response->json();
        $translated = trim($data['choices'][0]['message']['content'] ?? '');

        if ($translated === '') {
            throw new \RuntimeException('OpenAI tidak mengembalikan hasil terjemahan.');
        }

        return [
            'translated_text' => $translated,
            'provider'        => 'openai',
            'char_count'      => mb_strlen($text),
            'raw'             => $data
        ];
    }
}

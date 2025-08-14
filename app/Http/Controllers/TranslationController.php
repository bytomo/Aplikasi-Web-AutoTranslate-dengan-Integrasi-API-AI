<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\OpenAITranslateService;
use App\Models\Translation;

class TranslationController extends Controller
{
    protected $service;

    public function __construct(OpenAITranslateService $service)
    {
        $this->service = $service;
    }

    /**
     * Halaman utama translator (riwayat + form)
     */
    public function index()
    {
        $recent = Auth::check()
            ? Translation::where('user_id', Auth::id())
                ->latest()
                ->take(10)
                ->get()
            : collect();

        return view('translator.index', [
            'recent' => $recent
        ]);
    }

    /**
     * API terjemahan (publik & privat)
     */
    public function translate(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'from' => 'required|string|size:2',
            'to'   => 'required|string|size:2',
        ]);

        try {
            $result = $this->service->translate(
                $validated['text'],
                $validated['from'],
                $validated['to']
            );

            // Simpan histori jika user login
            if (Auth::check()) {
                Translation::create([
                    'user_id'         => Auth::id(),
                    'source_lang'     => $validated['from'],
                    'target_lang'     => $validated['to'],
                    'source_text'     => $validated['text'],
                    'translated_text' => $result['translated_text'],
                    'provider'        => $result['provider'] ?? 'openai',
                ]);
            }

            return response()->json([
                'success' => true,
                'data'    => $result,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
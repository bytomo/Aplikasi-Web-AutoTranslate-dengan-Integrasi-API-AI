@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="fx-card fx-hover p-4">
                <div class="text-gray-400 text-sm">Total Terjemahan</div>
                <div class="text-3xl font-bold text-white">{{ $total }}</div>
            </div>
            <div class="fx-card fx-hover p-4">
                <div class="text-gray-400 text-sm">Hari Ini</div>
                <div class="text-3xl font-bold text-white">{{ $today }}</div>
            </div>
            <div class="fx-card fx-hover p-4">
                <div class="text-gray-400 text-sm">Provider</div>
                <div class="text-lg capitalize text-white">
                    {{ $recent->first()->provider ?? 'openai' }}
                </div>
            </div>
        </div>

        <!-- Riwayat Terbaru -->
        <div class="fx-card fx-hover p-4">
            <h3 class="fx-title mb-3">Riwayat Terjemahan</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-300">
                    <thead class="bg-gray-800 text-gray-400 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Sumber</th>
                            <th class="px-4 py-2">Target</th>
                            <th class="px-4 py-2">Teks Asli</th>
                            <th class="px-4 py-2">Hasil Terjemahan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse ($recent as $r)
                            <tr class="hover:bg-gray-700/30 transition">
                                <td class="px-4 py-2">{{ $r->created_at->format('d M Y H:i') }}</td>
                                <td class="px-4 py-2">{{ strtoupper($r->source_lang) }}</td>
                                <td class="px-4 py-2">{{ strtoupper($r->target_lang) }}</td>
                                <td class="px-4 py-2 text-gray-400">{{ Str::limit($r->source_text, 50) }}</td>
                                <td class="px-4 py-2 text-green-300">{{ Str::limit($r->translated_text, 50) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                    Belum ada data.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
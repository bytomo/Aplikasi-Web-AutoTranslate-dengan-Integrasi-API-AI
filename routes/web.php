<?php

use App\Http\Controllers\TranslationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // Atau redirect ke dashboard jika login
});

/*
|--------------------------------------------------------------------------
| Route yang memerlukan login
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman translator untuk user login (menampilkan histori, dsb.)
    Route::get('/translator', [TranslationController::class, 'index'])->name('translator.index');

    // Endpoint privat (login required) → menyimpan ke database
    Route::post('/translator/translate', [TranslationController::class, 'translate'])
        ->middleware('throttle:30,1') // rate limit 30 req/menit
        ->name('translator.translate');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Endpoint publik untuk terjemahan (tanpa login)
|--------------------------------------------------------------------------
| PENTING: Tidak akan menyimpan hasil ke database jika user guest,
| karena di controller sudah ada pengecekan Auth::check()
*/
Route::post('/api/translate', [TranslationController::class, 'translate'])
    ->middleware('throttle:60,1') // rate limit publik 60 req/menit
    ->name('api.translate');

require __DIR__.'/auth.php';
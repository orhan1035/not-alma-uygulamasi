<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;

// Ana sayfa
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Giriş yaptıktan sonraki varsayılan yönlendirme
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

// Kimliği doğrulanmış kullanıcılar için not işlemleri
Route::middleware(['auth'])->group(function () {
    // Notlar
    Route::resource('notes', NoteController::class);

    // Profil görüntüleme/güncelleme/silme
    Route::get('/profile', function (Request $request) {
        return view('profile.edit', ['user' => $request->user()]);
    })->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel Breeze veya Jetstream tarafından tanımlanan auth rotaları
require __DIR__.'/auth.php';

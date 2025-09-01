<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Rute untuk dasbor klien
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
    Route::get('/ads/platforms', [ClientController::class, 'showAdPlatforms'])->name('ads.platforms');
    Route::get('/ads/review', [ClientController::class, 'showAdReview'])->name('ads.review');
    Route::get('/ads/balance', [ClientController::class, 'showAdBalance'])->name('ads.balance');
     Route::get('/ads/problem', [ClientController::class, 'showProblemAds'])->name('ads.problem');
});

Route::middleware(['auth'])->group(function () {
    // Rute untuk dasbor admin yang memerlukan autentikasi
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    // Rute untuk fitur profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';

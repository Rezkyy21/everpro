<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdReviewController as AdminAdReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Rute untuk dasbor klien
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
    Route::get('/ads/platforms', [ClientController::class, 'showAdPlatforms'])->name('ads.platforms');
    Route::get('/ads/review', [ClientController::class, 'showAdReview'])->name('ads.review');
    // Ini adalah rute POST untuk memproses form pengajuan review iklan
    Route::post('/ads/review', [ClientController::class, 'storeAdReview'])->name('ads.review.store');
    Route::get('/ads/balance', [ClientController::class, 'showAdBalance'])->name('ads.balance');
    Route::get('/ads/problem', [ClientController::class, 'showProblemAds'])->name('ads.problem');
});

Route::middleware(['auth'])->group(function () {
    // Rute untuk dasbor admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Rute untuk manajemen iklan
    Route::prefix('admin/iklan')->name('admin.iklan.')->group(function () {
        Route::get('/', [Admin\IklanController::class, 'index'])->name('index');
        Route::get('/create', [Admin\IklanController::class, 'create'])->name('create');
        Route::post('/', [Admin\IklanController::class, 'store'])->name('store');
        Route::delete('/{iklan}', [Admin\IklanController::class, 'destroy'])->name('destroy');
    });

    // Rute untuk manajemen review iklan (khusus admin)
    Route::prefix('admin/ad-review')->name('admin.ad_review.')->group(function () {
        Route::get('/', [AdminAdReviewController::class, 'index'])->name('index');
        Route::get('/{adReview}', [AdminAdReviewController::class, 'show'])->name('show');
        Route::patch('/{adReview}', [AdminAdReviewController::class, 'update'])->name('update');
    });
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

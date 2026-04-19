<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\QrCodeController;

Route::get('/', function () {
    return view('welcome');
});

// Auth manuel
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Page publique
Route::get('/u/{username}', [ProfilePageController::class, 'show'])
    ->name('public.profile');

// Redirection des liens
Route::get('/go/{link}', [ProfilePageController::class, 'redirect'])
    ->name('links.redirect');

// Routes protégées
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('links', LinkController::class)->except(['show']);

    Route::get('/my-qr', [QrCodeController::class, 'show'])
        ->name('qr.show');
});

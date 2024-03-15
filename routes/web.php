<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageHomeController;

Route::get('/', PageHomeController::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

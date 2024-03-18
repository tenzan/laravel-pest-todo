<?php

use App\Http\Controllers\PageCourseDetailsController;
use App\Http\Controllers\PageHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageHomeController::class)->name('home');
Route::get('courses/{course:slug}', PageCourseDetailsController::class)->name('course-details');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

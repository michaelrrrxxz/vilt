<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// 🛠️ Grouping Static Pages with Middleware
Route::middleware(['delay:1'])->group(function () {
    Route::get('/', fn() => Inertia::render('Home'))->name('home');
    Route::get('/contact', fn() => Inertia::render('Contact'))->name('contact');
    Route::get('/about', fn() => Inertia::render('About'))->name('about');
});

// 🛠️ User Routes
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
});

// 🛠️ Include Authentication Routes
require __DIR__.'/auth.php';

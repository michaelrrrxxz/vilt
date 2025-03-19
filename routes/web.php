<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    sleep(1);
    return Inertia::render('Login');
});
Route::get('/', function () {
    sleep(1);
    return Inertia::render('Home');
});
Route::get('/contact', function () {
    sleep(1);
    return Inertia::render('Contact');
});
Route::get('/about', function () {
    sleep(1);
    return Inertia::render('About');
});
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');

});


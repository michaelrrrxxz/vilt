<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    sleep(10);
    return Inertia::render('Login');
});
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');

});


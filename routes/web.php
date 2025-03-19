<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    sleep(1);
    return Inertia::render('Home');
});

Route::get('/login', function () {
    sleep(1);
    return Inertia::render('Login');
});


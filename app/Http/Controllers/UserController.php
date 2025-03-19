<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        sleep(1);
        return inertia('Home');
    }

    public function login()
    {
        sleep(1);
        return inertia('Login');
    }
}

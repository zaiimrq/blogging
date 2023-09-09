<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortallController extends Controller
{
    public function login()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function register()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }
}

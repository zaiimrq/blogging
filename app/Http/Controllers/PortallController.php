<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortallController extends Controller
{
    public function login()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function login_post(Request $request)
    {
        $login = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($login)) {
            
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        return back()->with('loginError', 'Email atau password tidak sesuai !');
    }

    public function register()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function register_post(Request $request)
    {
        $register = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3', 'max:255']
        ]);
        $register['password'] = bcrypt($register['password']);
        User::create($register);
        return redirect(route('login'))->with('success', 'Register berhasil, silahkan login!');
    }

    public function logout()
    {
        Auth::logout();
        session()->regenerateToken();

        return redirect(route('home'));
    }
}

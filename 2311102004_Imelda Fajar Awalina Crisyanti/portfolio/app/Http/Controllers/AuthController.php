<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if ($request->email === 'admin@portfolio.test' && $request->password === 'password') {
            session(['admin_login' => true]);
            return redirect('/admin');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        session()->forget('admin_login');
        return redirect('/login');
    }
}
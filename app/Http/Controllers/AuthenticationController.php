<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class AuthenticationController extends Controller
{
    public function loginPage(Request $request)
    {
        return Inertia::render('Login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'Email or password is invalid'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthenticationController extends Controller
{
    public function loginPage(Request $request)
    {
        return Inertia::render('Login');
    }
}

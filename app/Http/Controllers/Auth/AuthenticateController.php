<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'Login Form',    
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register', [
            'title' => 'Register User', 
        ]);
    }
}

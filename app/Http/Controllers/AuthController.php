<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('v_formlogin');
    }

    public function processLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email == 'admin@example.com' && $password == '123456') {
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Email atau password salah!');
        }
    }
}

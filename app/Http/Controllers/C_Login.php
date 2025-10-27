<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class C_Login extends Controller
{
    public function index()
    {
        return view('v_login');
    }

    public function login(Request $request)
    {
     
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required', // harus diceklis
        ], [
            'g-recaptcha-response.required' => 'Harap verifikasi bahwa Anda bukan robot✅',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $data = $response->json();

        if (!isset($data['success']) || $data['success'] !== true) {
            return back()->withErrors([
                'captcha' => 'Verifikasi reCAPTCHA gagal, silakan coba lagi.',
            ])->withInput();
        }

   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
    
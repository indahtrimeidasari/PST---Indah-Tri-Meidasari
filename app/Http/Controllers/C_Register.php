<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class C_Register extends Controller
{
    /**
     * Menampilkan halaman form registrasi
     */
    public function showRegistrationForm()
    {
        return view('v_register'); // pastikan view ini ada
    }

    /**
     * Memproses registrasi user baru
     */
    public function register(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // harus ada field password_confirmation
        ]);

        // Simpan data user baru ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => 'default.png', // tambahkan ini untuk mencegah error SQL 1364
        ]);

        // Login otomatis setelah registrasi berhasil
        Auth::login($user);

        // Redirect ke dashboard setelah login
        return redirect('/login')->with('success', 'Registrasi berhasil! Selamat datang.');
    }
}

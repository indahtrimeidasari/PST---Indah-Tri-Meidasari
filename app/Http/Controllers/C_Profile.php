<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class C_Profile extends Controller
{
    // 🔹 Menampilkan profil
    public function index()
    {
        $user = Auth::user();
        return view('v_profile', compact('user'));
    }

    // 🔹 Menampilkan halaman edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('v_profile', compact('user'));
    }

    // 🔹 Menyimpan perubahan profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // 🔐 Jika password diisi, ubah password
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        // 📸 Upload foto profil
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && Storage::disk('public')->exists('foto_user/' . $user->foto)) {
                Storage::disk('public')->delete('foto_user/' . $user->foto);
            }

            // Simpan foto baru
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('foto_user', $filename, 'public');
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
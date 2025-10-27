<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_TentangKami;
use Illuminate\Support\Facades\Storage;

class C_TentangKami extends Controller
{
    // 🧾 Tampilkan daftar data
    public function index()
    {
        $allTentang = M_TentangKami::orderBy('id', 'desc')->get();
        return view('v_tentangkami', compact('allTentang'));
    }

    // ➕ Tampilkan form tambah
    public function create()
    {
        return view('v_tentangtambah');
    }

    // 💾 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'visi', 'misi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('tentangkami', 'public');
        }

        M_TentangKami::create($data);

        return redirect()->route('tentang.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // ✏️ Tampilkan form edit
    public function edit($id)
    {
        $tentang = M_TentangKami::findOrFail($id);
        return view('v_tentangedit', compact('tentang'));
    }

    // 🔄 Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $tentang = M_TentangKami::findOrFail($id);
        $tentang->fill($request->only(['judul', 'deskripsi', 'visi', 'misi']));

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($tentang->gambar && Storage::exists('public/' . $tentang->gambar)) {
                Storage::delete('public/' . $tentang->gambar);
            }
            $tentang->gambar = $request->file('gambar')->store('tentangkami', 'public');
        }

        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'Data berhasil diperbarui!');
    }

    // 🗑️ Hapus data
    public function destroy($id)
    {
        $tentang = M_TentangKami::findOrFail($id);

        if ($tentang->gambar && Storage::exists('public/' . $tentang->gambar)) {
            Storage::delete('public/' . $tentang->gambar);
        }

        $tentang->delete();

        return redirect()->route('tentang.index')->with('success', 'Data berhasil dihapus!');
    }
}

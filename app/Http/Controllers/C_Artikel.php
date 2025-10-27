<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Artikel;
use Illuminate\Support\Facades\Storage;

class C_Artikel extends Controller
{
    public function index()
    {
        $artikel = M_Artikel::latest()->get();
        return view('v_artikel', compact('artikel'));
    }

    public function create()
    {
        return view('v_artikeltambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('uploads/artikel', 'public');
        }

        M_Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel = M_Artikel::findOrFail($id);
        return view('v_artikeledit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = M_Artikel::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $artikel->gambar = $request->file('gambar')->store('uploads/artikel', 'public');
        }

        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->penulis = $request->penulis;
        $artikel->tanggal = $request->tanggal;

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate!');
    }

    public function destroy($id)
    {
        $artikel = M_Artikel::findOrFail($id);
        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }

    public function show($id)
    {
        $artikel = M_Artikel::find($id);
        if (!$artikel) {
            return redirect('/artikel')->with('error', 'Artikel tidak ditemukan.');
        }
        return view('v_artikeldetail', compact('artikel'));
    }
}

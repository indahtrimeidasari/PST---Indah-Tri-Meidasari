<?php

namespace App\Http\Controllers;

use App\Models\M_Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class C_Dokumen extends Controller
{
    public function index()
    {
        $dokumen = M_Dokumen::latest()->get();
        return view('v_dokumen', compact('dokumen'));
    }

    public function create()
    {
        return view('v_dokumentambah');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_dokumen' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:foto,video,pdf',
        ];

        if ($request->tipe === 'video') {
            $rules['video_link'] = 'required|url';
        } elseif ($request->tipe === 'foto') {
            $rules['file'] = 'required|mimes:jpg,jpeg,png|max:10240';
        } elseif ($request->tipe === 'pdf') {
            $rules['file'] = 'required|mimes:pdf|max:10240';
        }

        $validated = $request->validate($rules);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads/dokumen', 'public');
        }

        M_Dokumen::create([
            'nama_dokumen' => $validated['nama_dokumen'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'tipe' => $validated['tipe'],
            'file_path' => $filePath,
            'foto' => $validated['tipe'] === 'foto' ? $filePath : null,
            'video_link' => $validated['video_link'] ?? null,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function edit(M_Dokumen $dokumen)
    {
        return view('v_dokumenedit', compact('dokumen'));
    }

    public function update(Request $request, M_Dokumen $dokumen)
    {
        $rules = [
            'nama_dokumen' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:foto,video,pdf',
        ];

        if ($request->tipe === 'video') {
            $rules['video_link'] = 'required|url';
        } elseif ($request->tipe === 'foto') {
            $rules['file'] = 'nullable|mimes:jpg,jpeg,png|max:10240';
        } elseif ($request->tipe === 'pdf') {
            $rules['file'] = 'nullable|mimes:pdf|max:10240';
        }

        $validated = $request->validate($rules);

        $filePath = $dokumen->file_path;
        if ($request->hasFile('file')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('uploads/dokumen', 'public');
        }

        $dokumen->update([
            'nama_dokumen' => $validated['nama_dokumen'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'tipe' => $validated['tipe'],
            'file_path' => $filePath,
            'foto' => $validated['tipe'] === 'foto' ? $filePath : null,
            'video_link' => $validated['video_link'] ?? null,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy(M_Dokumen $dokumen)
    {
        if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
            Storage::disk('public')->delete($dokumen->file_path);
        }
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Produk;
use App\Models\M_Dokumen;
use App\Models\M_Artikel;
use App\Models\M_TentangKami; // ✅ tambahkan model Tentang Kami

class C_Home extends Controller
{
    public function index()
    {
        // 📂 Ambil data untuk ditampilkan di landing page
        $dokumen = M_Dokumen::latest()->get();
        $artikel = M_Artikel::latest()->get();
        $tentangkami = M_TentangKami::latest()->get(); // ✅ tambahkan ini

        // 📤 Kirim semua data ke view index
        return view('v_index', compact('dokumen', 'artikel', 'tentangkami'));
    }
}

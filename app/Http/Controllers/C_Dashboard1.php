<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\M_Pesan; // ✅ Tambahan: untuk ambil pesan masuk

class C_Dashboard1 extends Controller
{
    public function index()
    {
        // Total Media Tanam
        $jumlahMediaTanam = DB::table('tb_mediatanam')->sum('jumlah');

        // Total Panen
        $totalPanen = DB::table('tb_panen')->sum('jumlah');

        // Panen Bulan Ini
        $panenBulanIni = DB::table('tb_panen')
            ->whereMonth('tanggal_panen', date('m'))
            ->whereYear('tanggal_panen', date('Y'))
            ->sum('jumlah');

        // Grafik Panen Bulanan: inisialisasi array 1-12 agar semua bulan selalu muncul
        $grafikPanen = array_fill(1, 12, 0); // [1 => 0, 2 => 0, ..., 12 => 0]

        $dataPanen = DB::table('tb_panen')
            ->selectRaw('MONTH(tanggal_panen) as bulan, SUM(jumlah) as total')
            ->groupBy(DB::raw('MONTH(tanggal_panen)'))
            ->pluck('total', 'bulan')
            ->toArray();

        // Gabungkan dengan bulan lengkap (1-12)
        foreach ($dataPanen as $bulan => $total) {
            $grafikPanen[$bulan] = $total;
        }

        // ✅ Tambahan: Ambil semua pesan masuk terbaru
        $pesanMasuk = M_Pesan::latest()->get();

        // ✅ Kirim semua data ke view v_dashboard1
        return view('admin.v_dashboard1', compact(
            'jumlahMediaTanam',
            'totalPanen',
            'panenBulanIni',
            'grafikPanen',
            'pesanMasuk' // ✅ Tambahan untuk ditampilkan di view
        ));
    }
}

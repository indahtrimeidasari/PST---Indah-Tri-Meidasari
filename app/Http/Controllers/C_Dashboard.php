<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class C_Dashboard extends Controller
{
    public function index()
    {
        // Total pesanan (dari semua pelanggan)
        $totalPesanan = DB::table('tb_pemesanan')->count();

        // Total pendapatan dari status yang mengandung kata 'Lunas'
        $totalPendapatan = DB::table('tb_pemesanan')
            ->where('status_pembayaran', 'LIKE', 'Lunas%')
            ->sum('total_bayar');

        // Total stok produk dari tb_produk
        $totalStok = DB::table('tb_produk')->sum('stok');

        // Data penjualan per bulan (1 - 12), hanya yg status Lunas%
        $penjualanPerBulan = DB::table('tb_pemesanan')
            ->selectRaw('MONTH(tanggal_pesan) as bulan, SUM(total_bayar) as total')
            ->where('status_pembayaran', 'LIKE', 'Lunas%')
            ->groupBy(DB::raw('MONTH(tanggal_pesan)'))
            ->pluck('total', 'bulan')
            ->toArray();

        // Pie chart: metode pembayaran dari semua data
        $metodePembayaran = DB::table('tb_pemesanan')
            ->select('metode_pembayaran', DB::raw('count(*) as jumlah'))
            ->groupBy('metode_pembayaran')
            ->pluck('jumlah', 'metode_pembayaran');

        // Jumlah tanam dari tb_mediatanam
        $jumlahTanam = DB::table('tb_mediatanam')->sum('jumlah');

        // Jumlah hasil panen dari tb_panen
        $jumlahPanen = DB::table('tb_panen')->sum('jumlah');

        $jumlahPesanMasuk = DB::table('tb_pesan')->count();


        // Kirim semua data ke dashboard view
        return view('admin.v_dashboard', compact(
            'totalPesanan',
            'totalPendapatan',
            'totalStok',
            'penjualanPerBulan',
            'metodePembayaran',
            'jumlahTanam',
            'jumlahPanen'
        ));
    }
}
 
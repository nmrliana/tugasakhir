<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PesananMenu;
use App\Models\Pesanan;
use App\Models\MenuKategori;

class AdminLaporanController extends Controller
{
    function index(Request $request, $tahun) {
    $data['tahun_link'] = $tahun;
    $data['data_terlaris'] = PesananMenu::whereYear('created_at', $tahun)->get();
    $data['pendapaan_tertinggi'] = Pesanan::whereYear('created_at', $tahun)->get();

    // Data penjualan bulanan
    $monthlyData = PesananMenu::whereYear('created_at', $tahun)
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');

    // Buat array dengan 12 bulan diinisialisasi dengan 0
    $dataCount = array_fill(1, 12, 0);
    
    // Isi array dengan data sebenarnya
    foreach ($monthlyData as $month => $count) {
        $dataCount[$month] = $count;
    }

    $data['data_terlaris'] = $dataCount;
    $data['tahun'] = $tahun;

    // Data pendapatan bulanan
    $monthlyRevenue = Pesanan::whereYear('created_at', $tahun)
        ->selectRaw('MONTH(created_at) as month, SUM(pesanan_total_harga) as total')
        ->groupBy('month')
        ->pluck('total', 'month');

    // Buat array dengan 12 bulan diinisialisasi dengan 0
    $revenueData = array_fill(1, 12, 0);
    
    // Isi array dengan data sebenarnya
    foreach ($monthlyRevenue as $month => $total) {
        $revenueData[$month] = $total;
    }

    $data['revenue_data'] = $revenueData;
    $data['list_kategori'] = MenuKategori::all();

    return view('admin.laporan.index', $data);
}

}

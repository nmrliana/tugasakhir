<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PesananMenu;
use App\Models\MenuKategori;

class AdminLaporanController extends Controller
{
    function index(Request $request,$tahun){
        $data['tahun_link'] = $tahun;
        $data['data_terlaris'] = PesananMenu::whereYear('created_at',$tahun)->get();

        $monthlyData = PesananMenu::whereYear('created_at', $tahun)
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');

        // Create an array with 12 months initialized to 0
        $dataCount = array_fill(1, 12, 0);
        
        // Fill the array with actual data
        foreach ($monthlyData as $month => $count) {
            $dataCount[$month] = $count;
        }

        $data['data_terlaris'] = $dataCount;
        $data['tahun'] = $tahun;

        $data['list_kategori'] = MenuKategori::all();
        return view('admin.laporan.index',$data);
    }
}

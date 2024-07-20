<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StokAwal;
use App\Models\Pesanan;

class AdminStokController extends Controller
{
    function index(){
        $data['stok_awal'] = StokAwal::all();
        $data['pendapatanHarian'] = Pesanan::sum('pesanan_total_harga');
        return view('admin.stok.index',$data);
    }
}

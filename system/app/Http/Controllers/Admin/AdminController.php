<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StokAwal;
use App\Models\PesananMenu;
use App\Models\Pesanan;
use App\Models\Menu;
use App\Models\MenuKategori;
use DB;

class AdminController extends Controller
{
    function beranda(){
        $data['tanggalSekarang']= $tanggalAwal = date('Y-m-d');
        $data['cekModal'] = StokAwal::where('stok_tanggal',$tanggalAwal)->count();

        $data['jumlahPesanan'] = Pesanan::count();
        $data['pendapatanHarian'] = Pesanan::sum('pesanan_total_harga');

        $data['produk_terlaris'] = DB::table('pesanan_menu')
        ->select('menu_id', DB::raw('DATE(created_at) as tanggal'), DB::raw('count(*) as total'))
        ->groupBy('menu_id', 'tanggal')
        ->get();

        $data['mingguan'] = 1500000;

        $menu = $data['list_menu'] = Menu::all();
        foreach($menu as $item){
         $totalPesanan = PesananMenu::where('menu_id', $item->menu_id)
         ->sum('menu_qty');
         $item->totalPesanan = $totalPesanan; 

         }

        $kategori = $data['list_kategori'] = MenuKategori::all();
            foreach($kategori as $item){
            $totalKategori = PesananMenu::where('menu_kategori_id', $item->menu_kategori_id)
            ->count();
            $item->totalKategori = $totalKategori; 
        }
        return view('admin.beranda',$data);
    }

    function modalAwal(){
        $ml = new StokAwal;
        $ml->stok_tanggal = date('Y-m-d');
        $ml->stok_modal_awal = request('modal_awal');
        $ml->stok_detail = request('stok_detail');
        $ml->save();
        return back()->with('success','Modal awal berhasil dibuat');
    }

}

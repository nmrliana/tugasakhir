<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\PesananMenu;
use App\Models\MenuKategori;
use Auth;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Carbon\Carbon;
class KasirController extends Controller
{
    function beranda(){
        $data['list_menu'] = Menu::where('flag_erase',1)
        ->where('menu_status',1)
        ->get();

        $data['totalHarga'] = PesananMenu::where('pesanan_status',0)
        ->sum('menu_harga');

        $data['totalHarga'] = PesananMenu::where('pesanan_status',0)
        ->where('auth_id',Auth::id())
        ->count();

        $data['list_pesanan'] = PesananMenu::where('pesanan_status',0)
        ->where('auth_id',Auth::id())
        ->get();

        $data['kategori'] = MenuKategori::where('flag_erase',1)->get();
        return view('kasir.beranda',$data)->with('success','Selamat datang');
    }

    function tambah(Menu $menu){
        $cek = PesananMenu::where('menu_id',$menu->menu_id)
        ->where('pesanan_status',0)
        ->count();

        $getData = PesananMenu::where('menu_id',$menu->menu_id)
        ->where('pesanan_status',0)
        ->first();

        if($cek == 0){
            $pesanan = new PesananMenu;
            $pesanan->menu_id = $menu->menu_id;
            $pesanan->menu_kategori_id = $menu->menu_kategori_id;
            $pesanan->menu_harga = $menu->menu_harga;
            $pesanan->menu_qty = 1;
            $pesanan->auth_id = Auth::id();
            $pesanan->save();

        }else{
            PesananMenu::where('menu_id',$menu->menu_id)
            ->where('pesanan_status',0)
            ->where('auth_id',Auth::id())
            ->update([
                'menu_qty' => $getData->menu_qty +1
            ]); 
        }

        return back();       
    }

    function resetPesanan(){
        PesananMenu::where('pesanan_status',0)
        ->where('auth_id',Auth::id())
        ->delete();
        return back()->with('success','Menu berhasil direset');
    }

    function deleteMenu(PesananMenu $pesanan){
        $pesanan->delete();
        return back();
    }

    function prosesPesanan(){
        $pesanan = new Pesanan;
        $pesanan->auth_id = Auth::id();
        $pesanan->pesanan_nama = request('pesanan_nama');
        $pesanan->pesanan_meja_nomor = request('pesanan_meja_nomor');
        $pesanan->pesanan_total_harga = request('pesanan_total_harga');
        $pesanan->pesanan_tanggal = date('d');
        $pesanan->pesanan_bulan = date('m');
        $pesanan->pesanan_tahun = date('Y');
        $pesanan->save();

        PesananMenu::where('pesanan_status',0)
        ->where('auth_id',Auth::id())
        ->update([
            'pesanan_id' => $pesanan->pesanan_id,
            'pesanan_status' => 1,
        ]); 
        $url = 'cetak/'.$pesanan->pesanan_id;
        $script = '<script>window.open("'.$url.'", "_blank");</script>';
        return redirect()->back()->with('success','Pesanan berhasil di proses')->with('script', $script);
    }

    function cetak(Pesanan $pesanan){
        $data['pesanan'] = $pesanan;
        $data['list_pesanan'] = PesananMenu::where('pesanan_id', $pesanan->pesanan_id)->get();

        // Set up printer
        $connector = new WindowsPrintConnector("FK80 Printer");
        $printer = new Printer($connector);

    // Print receipt
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Alas Daun\n");
        $printer->text("Order ID: " . $pesanan->pesanan_id . "\n");
        $printer->text("Date: " . $pesanan->created_at . "\n");
        $printer->text("-----------------------------\n");

        foreach ($data['list_pesanan'] as $item) {
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text($item->menu->menu_nama . " x " . $item->menu_qty . "\n");
            $printer->setJustification(Printer::JUSTIFY_RIGHT);
            $printer->text("Rp. " . number_format($item->menu_harga * $item->menu_qty) . "\n");
        }

        $printer->text("-----------------------------\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("Total: Rp. " . number_format($pesanan->pesanan_total_harga) . "\n");

        $printer->cut();
        $printer->close();

        return view('kasir.cetak', $data);
    }

    function history(){
        $data['list_menu'] = PesananMenu::where('pesanan_status',1)
        ->where('auth_id',Auth::id())
        ->whereDate('created_at', Carbon::today())
        ->get();
        return view('kasir.history',$data);
    }
}

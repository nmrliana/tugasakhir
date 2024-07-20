<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuKategori;

class AdminMenuKategoriController extends Controller
{
    function index(){
        $data['list_kategori'] = MenuKategori::where('flag_erase',1)->get();
        return view('admin.master-data.data-kategori.index',$data);
    }

  function store(){
    $kategori = new MenuKategori;
    $kategori->menu_kategori_nama = request('menu_kategori_nama');
    $kategori->handleUploadFoto();
    $kategori->save();
    return back()->with('success','Data kategori menu berhasil dibuat');
  }

  function destroy(MenuKategori $kategori){
    $kategori->flag_erase = 0;
    $kategori->save();
    return back()->with('danger','Data kategori berhasil dihapus');
  }
}

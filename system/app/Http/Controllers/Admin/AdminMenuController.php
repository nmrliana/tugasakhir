<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuKategori;
use App\Models\Menu;

class AdminMenuController extends Controller
{
    function index(){
        $data['list_menu'] = Menu::where('flag_erase',1)->get();
        return view('admin.master-data.data-menu.index',$data);
    }

    function create(){
        $data['list_kategori'] = MenuKategori::where('flag_erase',1)->get();
        $data['countKategori'] = MenuKategori::where('flag_erase',1)->count();
        return view('admin.master-data.data-menu.create',$data);
    }

    function store(){
        $menu = new Menu;
        $menu->menu_nama = request('menu_nama');
        $menu->menu_kategori_id = request('menu_kategori_id');
        $menu->menu_harga = request('menu_harga');
        $menu->menu_satuan = request('menu_satuan');
        $menu->handleUploadFoto();
        $menu->save();
        return redirect('admin/master-data/data-menu')->with('success','Menu makanan berhasil dibuat');
    }

    function show(Menu $menu){
        $data['detail'] = $menu;
        $data['list_kategori'] = MenuKategori::where('flag_erase',1)->get();
        $data['countKategori'] = MenuKategori::where('flag_erase',1)->count();
        return view('admin.master-data.data-menu.show',$data);
    }

    function update(Menu $menu){
        $menu->menu_nama = request('menu_nama');
        $menu->menu_kategori_id = request('menu_kategori_id');
        $menu->menu_harga = request('menu_harga');
        $menu->menu_satuan = request('menu_satuan');
        $menu->handleUploadFoto();
        $menu->save();
        return back()->with('success','Data berhasil diupdate');
    }

    function updateStatus(Menu $menu){
        $menu->menu_status = request('menu_status');
        $menu->save();
        return back()->with('success','Status berhasil diupdate');
    }
}

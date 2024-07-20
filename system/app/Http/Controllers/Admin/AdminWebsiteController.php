<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Slide;
use App\Models\Toko;

class AdminWebsiteController extends Controller
{
    function galeri(){
        $data['list_galeri'] = Galeri::all();
        return view('admin.website.galeri-pengunjung.index',$data);
    }

    function galeriStore(){
        $galeri = new Galeri;
        $galeri->handleUploadFoto();
        $galeri->judul_galeri = request('judul_galeri');
        $galeri->save();

        return back()->with('success','Galeri berhasil diunggah');
    }

    function galeriDestroy(Galeri $galeri){
        $galeri->delete();
        return back()->with('warning','Data berhasil dihapus');
    }


    function slide(){
        $data['list_slide'] = Slide::all();
        return view('admin.website.slide.index',$data);
    }

    function slideStore(){
        $slide = new Slide;
        $slide->handleUploadFoto();
        $slide->judul_slide = request('judul_slide');
        $slide->deskripsi = request('deskripsi');
        $slide->save();

        return back()->with('success','Galeri berhasil diunggah');
    }

    function slideDestroy(Slide $slide){
        $slide->delete();
        return back()->with('warning','Data berhasil dihapus');
    }

    function toko(){
        $data['toko'] = Toko::where('toko_id',1)->first();
        return view('admin.website.toko.index',$data);
    }

    function updateToko(Toko $toko){
        $toko->judul = request('judul');
        $toko->tentang = request('tentang');
        $toko->notlp = request('notlp');
        $toko->email = request('email');
        $toko->alamat = request('alamat');
        $toko->handleUploadFoto();
        $toko->save();

        return back()->with('success','Data berhasil diupate');
    }
}

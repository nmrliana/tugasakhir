<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Karyawan;

class AdminProfilController extends Controller
{
    function index(){
        $data['auth'] = Auth::user();
        return view('admin.profil.index',$data);
    }

    function edit(Karyawan $karyawan){
        $data['detail'] = $karyawan;
        return view('admin.profil.edit',$data);
    }

    function update(Karyawan $karyawan){
        $cekFoto = request('karyawan_foto');
        $karyawan->karyawan_nama = request('karyawan_nama');
        $karyawan->karyawan_jobdesk = request('karyawan_jobdesk');
        $karyawan->karyawan_posisi = request('karyawan_posisi');
        $karyawan->karyawan_alamat = request('karyawan_alamat');
        $karyawan->email = request('email');
        $karyawan->karyawan_notlp = request('karyawan_notlp');
        $karyawan->karyawan_tgl_masuk = request('karyawan_tgl_masuk');
        if($cekFoto == null){
            $karyawan->karyawan_foto = $karyawan->karyawan_foto;
        }else{
            $karyawan->handleUploadFoto();
        }
        $karyawan->save();

        return redirect('admin/profil')->with('success','Profil akun berhasil diupdate');
    }
}

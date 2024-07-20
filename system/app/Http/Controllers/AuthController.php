<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\StokAwal;

class AuthController extends Controller
{
    function login(){
        return view('login')->with('success','Masuk dahulu');
    }

    public function loginProses(Request $request) {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            if (Auth::user()->karyawan_posisi == 1) {
                return redirect()->intended('kasir/beranda')->with('success', 'Selamat datang kembali');
                } else if(Auth::user()->karyawan_posisi == 0){
                    $url = 'admin/beranda';
                    return redirect($url)->with('success', 'Selamat datang kembali, lengkapi stok awal hari ini !!!');
            
            }else{
                return back()->with('warning', 'Login Gagal, Periksa email atau password anda !!');
            }
        } else {
            return back()->with('warning', 'Login Gagal, Periksa email atau password anda !!');
        }
    }

function logout(){
    Auth::logout();
    return redirect('login')->with('success','Berhasil keluar');
}
}

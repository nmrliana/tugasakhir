<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StokAwal;

class AuthController extends Controller
{
    function login()
    {
        return view('login')->with('success', 'Masuk dahulu');
    }

    public function loginProses(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->karyawan_posisi == 1) {
                return redirect()->intended('kasir/beranda')->with('success', 'Selamat datang di dashboard Kasir');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout() // Pindahkan fungsi logout ke dalam kelas
    {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil keluar');
    }
}

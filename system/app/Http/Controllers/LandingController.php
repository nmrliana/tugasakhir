<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Galeri;
use App\Models\Slide;
use App\Models\Pesanan;
use App\Models\Menu;
use Carbon\Carbon; 

class LandingController extends Controller
{
    function index(){
        $data['toko'] = Toko::where('toko_id',1)->first();
        $data['list_galeri'] = Galeri::all();
        $data['list_slide'] = Slide::all();
        $data['total'] = Menu::count();
        $today = Carbon::today();   
        $data['today'] = Pesanan::whereDate('created_at', $today)->count();
        $currentMonth = Carbon::now()->month;
        $data['month'] = Pesanan::whereMonth('created_at', $currentMonth)->count();
        return view('landing.index',$data);
    }
}

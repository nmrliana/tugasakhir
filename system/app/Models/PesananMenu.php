<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananMenu extends Model
{
    use HasFactory;
    protected $table = 'pesanan_menu';
    protected $primaryKey = 'pesanan_menu_id';

    function menu(){
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}

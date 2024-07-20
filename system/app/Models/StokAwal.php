<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class StokAwal extends Model
{
    use HasFactory;
     protected $table = 'stok_awal';
    protected $primaryKey = 'stok_awal_id';


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Toko extends Model
{
    use HasFactory;
     protected $table = 'toko';
    protected $primaryKey = 'toko_id';

    function handleUploadFoto(){
        if(request()->hasFile('foto_utama')){
            $file = request()->file('foto_utama');
            $destination = "toko";
            $randomStr = Str::random(5);
            $filename = "toko-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->foto_utama = "app/".$url;
            $this->save;
        }
    }
}

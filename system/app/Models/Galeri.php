<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Galeri extends Model
{
    use HasFactory;
     protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';

    function handleUploadFoto(){
        if(request()->hasFile('foto')){
            $file = request()->file('foto');
            $destination = "galeri";
            $randomStr = Str::random(5);
            $filename = "galeri-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->foto = "app/".$url;
            $this->save;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class MenuKategori extends Model
{
    use HasFactory;
     protected $table = 'menu_kategori';
    protected $primaryKey = 'menu_kategori_id';


      function handleUploadFoto(){
        if(request()->hasFile('menu_kategori_foto')){
            $file = request()->file('menu_kategori_foto');
            $destination = "kategori";
            $randomStr = Str::random(5);
            $filename = "kategori-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->menu_kategori_foto = "app/".$url;
            $this->save;
        }
    }
}

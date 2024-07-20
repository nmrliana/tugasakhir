<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Menu extends Model
{
    use HasFactory;
     protected $table = 'menu';
    protected $primaryKey = 'menu_id';

    function handleUploadFoto(){
        if(request()->hasFile('menu_foto')){
            $file = request()->file('menu_foto');
            $destination = "menu";
            $randomStr = Str::random(5);
            $filename = "menu-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->menu_foto = "app/".$url;
            $this->save;
        }
    }
}

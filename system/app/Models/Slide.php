<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Slide extends Model
{
    use HasFactory;
     protected $table = 'slide';
    protected $primaryKey = 'slide_id';

    function handleUploadFoto(){
        if(request()->hasFile('foto')){
            $file = request()->file('foto');
            $destination = "slide";
            $randomStr = Str::random(5);
            $filename = "slide-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->foto = "app/".$url;
            $this->save;
        }
    }
}

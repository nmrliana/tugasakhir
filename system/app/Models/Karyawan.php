<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class Karyawan extends Authenticatable
{
      use HasApiTokens, HasFactory, Notifiable;
      protected $table = 'karyawan';
      protected $primaryKey = 'karyawan_id';


      function handleUploadFoto(){
          if(request()->hasFile('karyawan_foto')){
            $file = request()->file('karyawan_foto');
            $destination = "kategori";
            $randomStr = Str::random(5);
            $filename = "karyawan-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->karyawan_foto = "app/".$url;
            $this->save;
      }
}

}

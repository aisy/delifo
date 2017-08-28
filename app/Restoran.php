<?php

namespace App;

use App\Menu as Menu;

use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    //
    protected $table = 'restoran';
    protected $fillable = ['nama_restoran','lat','lng','formatted_address','no_telp','gambar','jam_operasional'];

    public function daftar_menu(){
      return $this->hasMany(Menu::class);
    }
}

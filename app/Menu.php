<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table    ='menu';
    protected $fillable = ['restoran_id','nama_menu','gambar','harga','deskripsi'];

    public function Menu(){
    	return $this->belongsTo(DetailOrder::class);
    }
}

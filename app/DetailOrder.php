<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    //
    protected $table = 'detail_order';

    protected $fillable = ['id_order','nama_order','keterangan','alamat','longitude','latitude'];

    public function Detail(){
    	return $this->hasMany('Order');
    }
    
}

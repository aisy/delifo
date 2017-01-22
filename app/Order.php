<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     //memanggil nama tabel
	protected $table = 'order';
    //field yang bisa di isi
	protected $fillable = ['alamat', 'deskripsi', 'tanggal', 'status', 'id_user', 'id_driver', 'longitude', 'latitude'];
	
	public function Order(){
		return $this->hasMany('User');
	}

}

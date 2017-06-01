<?php

namespace App;

use App\User as User;
use App\DetailOrder as DetailOrder;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     //memanggil nama tabel
	protected $table = 'order';
    //field yang bisa di isi
	protected $fillable = ['alamat', 'deskripsi', 'tanggal', 'status', 'user_id', 'driver_id', 'longitude', 'latitude','total_harga'];

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function data_user(){
		return $this->hasOne(User::class);
	}

	public function detail_order(){
		return $this->hasMany(DetailOrder::class);
	}

	public function order(){
		return $this->hasMany(DetailOrder::class);
	}

}

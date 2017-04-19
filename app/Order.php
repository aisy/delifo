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
	protected $fillable = ['alamat', 'deskripsi', 'tanggal', 'status', 'user_id', 'driver_id', 'longitude', 'latitude'];

	public function user(){
		return $this->belongsTo('User');
	}

	public function detail_order(){
		return $this->hasMany(DetailOrder::class);
	}

}

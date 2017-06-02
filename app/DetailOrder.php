<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order as Order;

class DetailOrder extends Model
{
    //
    protected $table = 'detail_order';

    protected $fillable = ['order_id','menu_id','keterangan','status','alamat','longitude','latitude','harga','jumlah'];

    public function Detail(){
    	return $this->belongsTo(Order::class);
    }

}

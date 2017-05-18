<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model{
    //
    protected $table = "order";
    protected $fillable = ['jml_jarak','tarif'];
}

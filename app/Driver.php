<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Driver extends Model
{
    //memanggil nama tabel
    protected $table = 'driver';
    //field yang bisa di isi
    protected $fillable = ['nama_lengkap', 'jkel', 'telpon','gambar', 'username', 'password'];
    
}

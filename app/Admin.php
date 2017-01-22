<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract{

	use Authenticatable, CanResetPassword;

    //memanggil nama tabel
    protected $table = 'admin';
    //field yang bisa di isi
    protected $fillable = ['nama_lengkap', 'username', 'password', 'jkel', 'telpon'];
    
    protected $hidden = ['remember_token','password'];
}

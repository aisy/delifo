<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    	'user/tambah-data', 
        'user/login', 
        'admin/login', 
        'detail-order/insertDO',
        // 'order/api/konfirmasi/{id}'
        // 'kurir.hapus_data.delete',
        'kurir/hapus-data'
    ];

    private $openRoutes = ['user/tambah-data','order/api/konfirmasi/{id}'];
}

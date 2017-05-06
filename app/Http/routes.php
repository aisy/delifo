<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// halaman Utama
Route::resource('home', 'AdminController@halaman_utama');

Route::get('/', function(){
	if(Auth::check()){
		// return Redirect::to('/');
		// return Redirect::to('home');
		echo Auth::check()->id;
	}elseif(Auth::guest()){
		// return Redirect::to('/');
	}
});

// login ============================================================
Route::resource('/', 'AdminController');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// register
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


// user ============================================================
Route::resource('user/', 'UserController');
Route::get('user/data-user', 'UserController@get_user');
Route::get('user/data-user/{id}', 'UserController@show');
Route::post('user/tambah-data', 'UserController@store');
// Route::put('users/ubah/{id}',);
Route::delete('user/hapus/{id}', 'UserController@delete');

Route::post('user/login', 'UserController@log');

// pengguna ========================================================
Route::resource('pengguna/', 'UserController');


// order ===========================================================
Route::resource('order/', 'OrderController');
Route::get('order/data-order', 'OrderController@get_all');
Route::post('order/tambah-data', 'OrderController@insert');
Route::get('order/detail-order/{id}', 'OrderController@detail');
Route::get('order/ubah-order/{id}', 'OrderController@edit');
Route::patch('order/ubah-order/{id}', 'OrderController@update');
Route::delete('order/hapus-order/{id}', ['as'=>'order.hapus_data.delete', 'uses'=>'OrderController@destroy']);


// === order API
// Route::post('order/api/tambah-data', 'OrderController@api_insert');
Route::get('order/api/order-user/{id}', 'OrderController@api_orderUser');
// Route::put('order/api/data-order', 'OrderController@api_');
Route::post('order/tambah-data', 'OrderController@insertDO');
Route::get('order/api/data-order', 'OrderController@api_show');
Route::get('order/api/data-order/{id}', 'OrderController@api_find');
Route::get('order/api/user/{id}', 'OrderController@api_orderUser');
Route::get('order/api/user-order/{id}', 'OrderController@api_detailUser');
// Route::post('order/api/konfirmasi/{id}', 'OrderController@api_konfirmasi');

Route::get('order/api/data-order2','OrderController@api_OrderList');

Route::get('order/lol','OrderController@lol');

Route::patch('order/api/konfirmasi/{id}', 'OrderController@api_konfirmasi');
Route::patch('order/api/konfirmasi-item/{id}', 'OrderController@item_konfirmasi');
Route::patch('order/api/cancel-item/{id}', 'OrderController@item_cancel');

// kurir ===========================================================
Route::resource('kurir/', 'DriverController@index');
Route::post('kurir/tambah-data', 'DriverController@create');
Route::get('kurir/ubah-data/{id}', 'DriverController@edit');
Route::get('kurir/data_order', 'OrderController@api_show');
Route::get('kurir/data_order/{id}', 'OrderController@api_find');
Route::patch('kurir/ubah-data/{id}', 'DriverController@update');
Route::delete('kurir/hapus-data/{id}', ['as'=>'kurir.hapus_data.delete','uses'=>'DriverController@destroy']);


// =============================================================================
// RESTORAN
// =============================================================================
Route::resource('restoran', 'RestoranController');
Route::post('restoran', 'RestoranController@create');
Route::get('restoran-edit/{id}', 'RestoranController@edit');
Route::patch('restoran-edit/{id}', 'RestoranController@update');
Route::delete('restoran/{id}','RestoranController@delete');

// API
Route::get('restoran/api/getAll', 'RestoranController@api_result_all');
Route::get('restoran/api/get', 'RestoranController@api_result_restoran');
Route::post('restoran/api/post', 'RestoranController@api_post');

// =============================================================================
// MENU
// =============================================================================
Route::get('menu/{id}', 'MenuController@index');
Route::post('menu/{id}', 'MenuController@create');
Route::get('menu-edit/{id}', 'MenuController@edit');
Route::patch('menu-edit/{id}', 'MenuController@update');

// API
Route::get('menu/api/getRestoran/{id}', 'MenuController@getByRestoran');

// =============================================================================
// KURIR
// =============================================================================
// Route::post('kurir/login', 'DriverController@login');
Route::post('kurir/data-kurir', 'DriverController@show');
Route::get('kurir/api/data-order', 'OrderController@api_showInvalid');
Route::get('kurir/api/data-order/{id}', 'OrderController@api_find');
// Route::put('kurir/api/konfirmasi/{id}', 'OrderController@');
Route::post('kurir/api/login', 'DriverController@login');

// Admin ===========================================================
Route::get('admin/', 'AdminController@list_admin');
Route::post('admin/', 'AdminController@create2');
Route::get('admin/update/{id}', 'AdminController@edit');
Route::patch('admin/proses-update/{id}', 'AdminController@update');
Route::delete('admin/hapus/{id}', ['as'=>'admin.hapus_data.delete','uses'=>'AdminController@destroy']);

Route::post('admin/login', 'AdminController@log');

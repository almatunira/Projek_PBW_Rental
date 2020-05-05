<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  'PageController@index');
Route::get('/login',  'PageController@login');
Route::post('/login',  'UserController@cek_login');
Route::get('/daftar',  'UserController@daftar');
Route::post('/daftar',  'UserController@buat_akun');
Route::get('/logout',  'PageController@logout');

Route::get('/admin',  'MobilController@index');
Route::get('/admin/login',  'PageController@login_admin');
Route::get('/admin/data-pelanggan',  'UserController@admin_data_pelanggan');
Route::get('/admin/riwayat',  'UserController@admin_riwayat');
Route::get('/admin/profil',  'UserController@admin_profil');
Route::resource('/admin/mobil', 'MobilController');

Route::get('/user',  'UserController@pemesanan');
Route::get('/user/profil/{user}',  'UserController@user_profil');
Route::get('/user/riwayat',  'UserController@user_riwayat');
Route::get('/user/order/{mobil}',  'UserController@order');
Route::post('/user/order',  'UserController@kirim_order');
Route::get('user/{user}/edit', 'UserController@edit');
Route::patch('user/{user}', 'UserController@update');

Route::get('user/password/{user}/edit/', 'UserController@ubah_password');
Route::patch('user/password/{user}', 'UserController@update_password');














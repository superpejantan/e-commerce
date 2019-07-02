<?php

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
Route::get('a/', function(){
    return view('home');});

Route::get('/','LayarDpnController@index');
Route::get('add-toCart/{id}','LayarDpnController@addto_Cart');
Route::get('detail/{id_barang}','LayarDpnController@beli_lsg');
Route::post('bel_lsg','LayarDpnController@beli_barang');
Route::get('keluar','LayarDpnController@keluar');

Route::get('propinsi','RajaOngkirController@getpropinsi');
Route::get('kota','RajaOngkirController@kota');

Route::get('pembayaran','CartController@pembayaran');
Route::get('/keranjang','CartController@index');
Route::get('kembali','CartController@kembali');
Route::get('cart-qty/update/{id}', 'CartController@update');
Route::get('cart-qty/kurangi/{id}','CartController@kurangi');

Route::get('showbayar','InvoiceController@showbayar');
Route::get ('invoice','InvoiceController@index');
Route::get('invoice/list','InvoiceController@list');
Route::get('data/pesanan','InvoiceController@yajra_list');
Route::post('konfirmasi/pembayaran','InvoiceController@konfirmasi_bayar');
Route::get('konfirmasi','InvoiceController@konfirmasi');


Route::get('admin/upload/barang/10100','TambahBarangController@index');
Route::post('upload/barang','TambahBarangController@store');
Route::post('upload/brang','TambahBarangController@create');
Route::get('admin/barang/','TambahBarangController@tampil');


Route::group(['middleware'=>'auth'], function(){
Route::get('cekout','CartController@check_out');
Route::post('bayar','CartController@bayar');

Route::post('biaya_kirim','RajaOngkirController@cek_ongkir');
Route::post('Cetak_Ongkir','RajaOngkirController@cetak_ongkir');
Route::get('showbayar','InvoiceController@showbayar');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

// Admin
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->middleware('role:admin');
Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'user_index'])->middleware('role:admin');
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_user_index'])->middleware('role:admin');
Route::post('/admin/user/edit/update/{id}', [App\Http\Controllers\AdminController::class, 'update_user_query'])->middleware('role:admin');
Route::get('/admin/user/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapus_user_query'])->middleware('role:admin');

Route::get('/admin/barang(jual)', [App\Http\Controllers\AdminController::class, 'barang_jual_index'])->middleware('role:admin');
Route::get('/admin/barang(jual)/tambah', [App\Http\Controllers\AdminController::class, 'tambah_barang_jual_index'])->middleware('role:admin');
Route::post('/admin/barang(jual)/tambah/barang/', [App\Http\Controllers\AdminController::class, 'tambah_barang_jual_query'])->middleware('role:admin');
Route::get('/admin/barang(jual)/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_barang_jual_index'])->middleware('role:admin');
Route::post('/admin/barang(jual)/edit/update/{id}', [App\Http\Controllers\AdminController::class, 'edit_barang_jual_query'])->middleware('role:admin');
Route::get('/admin/barang(jual)/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapus_barang_jual'])->middleware('role:admin');

Route::get('/admin/barang(sewa)', [App\Http\Controllers\AdminController::class, 'barang_sewa_index'])->middleware('role:admin');
Route::get('/admin/barang(sewa)/tambah', [App\Http\Controllers\AdminController::class, 'tambah_barang_sewa_index'])->middleware('role:admin');
Route::post('/admin/barang(sewa)/tambah/barang/', [App\Http\Controllers\AdminController::class, 'tambah_barang_sewa_query'])->middleware('role:admin');
Route::get('/admin/barang(sewa)/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_barang_sewa_index'])->middleware('role:admin');
Route::post('/admin/barang(sewa)/edit/update/{id}', [App\Http\Controllers\AdminController::class, 'edit_barang_sewa_query'])->middleware('role:admin');
Route::get('/admin/barang(sewa)/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapus_barang_sewa'])->middleware('role:admin');

Route::get('/admin/pesanan(jual)', [App\Http\Controllers\AdminController::class, 'pesanan_jual_index'])->middleware('role:admin');
Route::get('/admin/pesanan(jual)/terima/{id}/{sell_id}', [App\Http\Controllers\AdminController::class, 'pesanan_jual_terima'])->middleware('role:admin');
Route::get('/admin/pesanan(jual)/tolak/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_jual_tolak'])->middleware('role:admin');
Route::get('/admin/pesanan(jual)/tolak/{id}/{sell_id}', [App\Http\Controllers\AdminController::class, 'pesanan_jual_tolak_balik'])->middleware('role:admin');
Route::get('/admin/pesanan(jual)/ubah/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_jual_ubah_index'])->middleware('role:admin');
Route::post('/admin/pesanan(jual)/ubah/edit/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_jual_ubah_query'])->middleware('role:admin');
Route::get('/admin/pesanan(jual)/bayar/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_jual_bayar'])->middleware('role:admin');
Route::get('/admin/pesanan(jual)/kirim/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_jual_kirim'])->middleware('role:admin');
Route::get('/admin/pesanan(sewa)', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_index'])->middleware('role:admin');
Route::get('/admin/pesanan(sewa)/terima/{id}/{rent_id}', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_terima'])->middleware('role:admin');
Route::get('/admin/pesanan(sewa)/tolak/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_tolak'])->middleware('role:admin');
Route::get('/admin/pesanan(sewa)/tolak/{id}/{rent_id}', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_tolak_balik'])->middleware('role:admin');
Route::get('/admin/pesanan(sewa)/ubah/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_ubah_index'])->middleware('role:admin');
Route::post('/admin/pesanan(sewa)/ubah/edit/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_ubah_query'])->middleware('role:admin');
Route::get('/admin/pesanan(sewa)/bayar/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_bayar'])->middleware('role:admin');
Route::get('/admin/pesanan(sewa)/kirim/{id}', [App\Http\Controllers\AdminController::class, 'pesanan_sewa_kirim'])->middleware('role:admin');
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Toko
Route::get('/index', [App\Http\Controllers\UserController::class, 'index']);
Route::post('/index/pesanan(jual)/{user_id}/{id}/{harga}', [App\Http\Controllers\UserController::class, 'index_pesanan_jual_query']);
Route::post('/index/pesanan(sewa)/{user_id}/{id}/{harga}', [App\Http\Controllers\UserController::class, 'index_pesanan_sewa_query']);
Route::get('/penjualan', [App\Http\Controllers\UserController::class, 'penjualan_index']);
Route::post('/pesanan(jual)/{user_id}/{id}/{harga}', [App\Http\Controllers\UserController::class, 'pesanan_jual_query']);
Route::post('/pesanan(sewa)/{user_id}/{id}/{harga}', [App\Http\Controllers\UserController::class, 'pesanan_sewa_query']);
Route::get('/penyewaan', [App\Http\Controllers\UserController::class, 'penyewaan_index']);
Route::get('/tentang_kami', [App\Http\Controllers\UserController::class, 'tentang_kami']);
Route::get('/search/penjualan', [App\Http\Controllers\UserController::class, 'search_penjualan']);
Route::get('/search/penyewaan', [App\Http\Controllers\UserController::class, 'search_penyewaan']);
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// User
Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'user_dashboard']);
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile']);
Route::post('/user/profile/edit/{id}', [App\Http\Controllers\UserController::class, 'edit_profile']);
Route::get('/user/pesanan(jual)/{id}', [App\Http\Controllers\UserController::class, 'pesanan_user_jual_index']);
Route::get('/user/pesanan(sewa)/{id}', [App\Http\Controllers\UserController::class, 'pesanan_user_sewa_index']);
Route::get('/user/change_password', [App\Http\Controllers\UserController::class, 'masukkan_email']);
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------


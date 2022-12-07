<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\pembeliController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\tiketController;
use App\Http\Controllers\loginController;

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

Route::get('/admin/add', [adminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [adminController::class, 'store'])->name('admin.store');
Route::get('/admin', [adminController::class, 'index'])->name('admin.index');
Route::get('/admin/edit/{id}', [adminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [adminController::class, 'update'])->name('admin.update');
Route::post('/admin/delete/{id}', [adminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/search', [adminController::class, 'search'])->name('admin.search');
Route::get('/admin/hide/{id}', [adminController::class, 'hide'])->name('admin.hide');
Route::get('/admin/trash', [adminController::class, 'trash'])->name('admin.trash');
Route::get('/admin/restore/{id}', [adminController::class, 'restore'])->name('admin.restore');
Route::get('/admin/search/trash', [adminController::class, 'search_trash'])->name('admin.search_trash');

Route::get('/pembeli/add', [pembeliController::class, 'create'])->name('pembeli.create');
Route::post('/pembeli/store', [pembeliController::class, 'store'])->name('pembeli.store');
Route::get('/pembeli', [pembeliController::class, 'index'])->name('pembeli.index');
Route::get('/pembeli/edit/{id}', [pembeliController::class, 'edit'])->name('pembeli.edit');
Route::post('/pembeli/update/{id}', [pembeliController::class, 'update'])->name('pembeli.update');
Route::post('/pembeli/delete/{id}', [pembeliController::class, 'delete'])->name('pembeli.delete');
Route::get('/pembeli/search', [pembeliController::class, 'search'])->name('pembeli.search');
Route::get('/pembeli/hide/{id}', [pembeliController::class, 'hide'])->name('pembeli.hide');
Route::get('/pembeli/trash', [pembeliController::class, 'trash'])->name('pembeli.trash');
Route::get('/pembeli/restore/{id}', [pembeliController::class, 'restore'])->name('pembeli.restore');
Route::get('/pembeli/search/trash', [pembeliController::class, 'search_trash'])->name('pembeli.search_trash');

Route::get('/pembelian/add', [pembelianController::class, 'create'])->name('pembelian.create');
Route::post('/pembelian/store', [pembelianController::class, 'store'])->name('pembelian.store');
Route::get('/pembelian', [pembelianController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian/edit/{id}', [pembelianController::class, 'edit'])->name('pembelian.edit');
Route::post('/pembelian/update/{id}', [pembelianController::class, 'update'])->name('pembelian.update');
Route::post('/pembelian/delete/{id}', [pembelianController::class, 'delete'])->name('pembelian.delete');
Route::get('/pembelian/search', [pembelianController::class, 'search'])->name('pembelian.search');
Route::get('/pembelian/hide/{id}', [pembelianController::class, 'hide'])->name('pembelian.hide');
Route::get('/pembelian/trash', [pembelianController::class, 'trash'])->name('pembelian.trash');
Route::get('/pembelian/restore/{id}', [pembelianController::class, 'restore'])->name('pembelian.restore');
Route::get('/pembelian/search/trash', [pembelianController::class, 'search_trash'])->name('pembelian.search_trash');

Route::get('/tiket/add', [tiketController::class, 'create'])->name('tiket.create');
Route::post('/tiket/store', [tiketController::class, 'store'])->name('tiket.store');
Route::get('/tiket', [tiketController::class, 'index'])->name('tiket.index');
Route::get('/tiket/edit/{id}', [tiketController::class, 'edit'])->name('tiket.edit');
Route::post('/tiket/update/{id}', [tiketController::class, 'update'])->name('tiket.update');
Route::post('/tiket/delete/{id}', [tiketController::class, 'delete'])->name('tiket.delete');
Route::get('/tiket/search', [tiketController::class, 'search'])->name('tiket.search');
Route::get('/tiket/hide/{id}', [tiketController::class, 'hide'])->name('tiket.hide');
Route::get('/tiket/trash', [tiketController::class, 'trash'])->name('tiket.trash');
Route::get('/tiket/restore/{id}', [tiketController::class, 'restore'])->name('tiket.restore');
Route::get('/tiket/search/trash', [tiketController::class, 'search_trash'])->name('tiket.search_trash');


Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::get('/login/store', [LoginController::class, 'store'])->name('login.store');

// Route::get('/', function () {
//     return view('welcome');
// });
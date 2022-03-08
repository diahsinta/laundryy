<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetilTransaksiController;


Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => ['jwt.verify:admin,kasir,owner']], function() {
    Route::post('login/check', [UserController::class, 'loginCheck']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('insert', [UserController::class, 'insert']);
    Route::get('dashboard', [DashboardController::class, 'index']);
});


//Route khusus admin
Route::group(['middleware' => ['jwt.verify:admin']], function() {
    
    //OUTLET
    Route::get('outlet', [outletController::class, 'getAll']);
    Route::get('outlet/{id}', [outletController::class, 'getById']);
    Route::post('outlet', [outletController::class, 'store']);
    Route::put('outlet/{id}', [outletController::class, 'update']);
    Route::delete('outlet/{id}', [outletController::class, 'delete']);
    
    //PAKET
    Route::get('paket', [paketController::class, 'getAll']);
    Route::get('paket/{id}', [paketController::class, 'getById']);
    Route::post('paket', [paketController::class, 'store']);
    Route::put('paket/{id}', [paketController::class, 'update']);
    Route::delete('paket/{id}', [paketController::class, 'delete']);
    
    //USER
    Route::post('user/tambah', [UserController::class, 'register']);    
});


//Route khusus admin & kasir
Route::group(['middleware' => ['jwt.verify:admin,kasir']], function() {

    //MEMBER
    Route::post('member', [memberController::class, 'store']);
    Route::get('member', [memberController::class, 'getAll']);
    Route::get('member/{id}', [memberController::class, 'getById']);
    Route::put('member/{id}', [memberController::class, 'update']);
    Route::delete('member/{id}', [memberController::class, 'delete']);
    
    //TRANSAKSI
    Route::post('transaksi', [transaksiController::class, 'store']);
    Route::get('transaksi/{id}', [transaksiController::class, 'getById']);
    Route::get('transaksi', [transaksiController::class, 'getAll']);
    Route::post('transaksi/detil', [detail_transaksiController::class, 'store']);

    // Route::get('getDetail/{id}', [TransaksiController::class, 'getDetail']);
    Route::get('transaksi/detil/{id}', [detail_transaksiController::class, 'getById']);
    Route::post('transaksi/status/{id}', [transaksiController::class, 'changeStatus']);
    Route::post('transaksi/bayar/{id}', [transaksiController::class, 'bayar']);
    Route::get('transaksi/total/{id}', [Detail_transaksiController::class, 'getTotal']);    
});

Route::group(['middleware' => ['jwt.verify:owner']], function() {
    Route::get('report', [transaksiController::class, 'report']);
});

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/paket.blade.php', function () {
    return view('paket');
});

//member
Route::get('/member.blade.php', function () {
    return view('member');
});

Route::get('/update_member.blade.php', function () {
    return view('member');
});


Route::get('/outlet.blade.php', function () {
    return view('outlet');
});

Route::get('/transaksi.blade.php', function () {                                                                                                                                                            
    return view('transaksi');
});

Route::get('/data_pengurus.blade.php', function () {
    return view('data_pengurus');
});

?>
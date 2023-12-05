<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\CariController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\Type_TransportasiController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SignupController;
use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Petugas;
use App\Models\Rute;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\LogicalAnd;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('/administrator/index');
});
Route::get('/user/index', function (){
    return view('home',  ['penumpang'=>Penumpang::all(), 'rute'=>Rute::all(), 'petugas'=>Petugas::all()]);
});
Route::get('/pesan', function(){
    return view('pesan');
});
Route::get('/pembayaran', function(){
    return view('user/pembayaran', ['pemesanan'=>Pemesanan::all()]);
});





Route::resource('/pemesanan', PemesananController::class);
Route::resource('/petugas', PetugasController::class);
Route::resource('/typetransportasi', Type_TransportasiController::class);
Route::resource('/transportasi', TransportasiController::class);
Route::resource('/rute', RuteController::class);
Route::resource('/penumpang', PenumpangController::class);
Route::resource('/verifikasi', VerifikasiController::class);
Route::resource('/pesan', PesanController::class);
Route::get('cetakpdf','App\Http\Controllers\VerifikasiController@cetakpdf');

//route login user

// Route::get('/user/home','UserHomeController@index')->name('user.home');
Route::get('/', [SesiController::class, 'index']);
Route::post('login', [SesiController::class, 'login']);     
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/admin', [AdminController::class, 'admin']);
Route::get('/home', [AdminController::class, 'penumpang'])->name('home');

//route logout
Route::get('/logout', [SesiController::class, 'logout']);
Route::get('/admin/logout', [SesiController::class, 'logout']);

Route::resource('register', RegisterController::class);
// Route::get('/administrator/index', 'AdminHomeController@index')->name('admin.index');

//route register
// Route::get('signup', [SignupController::class, 'index'])->name('signup');
// Route::post('signup', [SignupController::class, 'proces']);

//tiket
Route::resource('cari', CariController::class);


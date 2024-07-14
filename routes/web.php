<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthPoinController;

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
    return view('Templates.LTELayout');
});

Route::get('/login', [AuthPoinController::class, 'LoginViewPoin'])->name('login');
Route::get('/register', [AuthPoinController::class, 'RegisterViewPoin'])->name('register');
Route::get('/BarangMasuk', [AuthPoinController::class, 'BarangMasuk'])->name('BarangMasuk');
Route::get('/Barang', [AuthPoinController::class, 'Barang'])->name('Barang');
Route::get('/OwenerAccess', [AuthPoinController::class, 'OwenerAccess'])->name('OwenerAccess');
Route::get('/kasir', [AuthPoinController::class, 'kasir'])->name('kasir');
Route::get('/SalesForm', [AuthPoinController::class, 'SalesForm'])->name('SalesForm');
Route::get('/OwnerForm', [AuthPoinController::class, 'OwnerForm'])->name('OwnerForm');
Route::get('/Laporan', [AuthPoinController::class, 'Laporan'])->name('Laporan');
Route::get('/DetailLaporan', [AuthPoinController::class, 'DetailLaporan'])->name('DetailLaporan');

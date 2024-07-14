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

Route::any('/login', [AuthPoinController::class, 'LoginViewPoin'])->name('login');
Route::any('/register', [AuthPoinController::class, 'RegisterViewPoin'])->name('register');
Route::any('/BarangMasuk', [AuthPoinController::class, 'BarangMasuk'])->name('BarangMasuk');
Route::any('/Barang', [AuthPoinController::class, 'Barang'])->name('Barang');
Route::any('/OwnerAccess', [AuthPoinController::class, 'OwnerAccess'])->name('OwenerAccess');
Route::any('/kasir', [AuthPoinController::class, 'kasir'])->name('kasir');
Route::any('/SalesForm', [AuthPoinController::class, 'SalesForm'])->name('SalesForm');
Route::any('/OwnerForm', [AuthPoinController::class, 'OwnerForm'])->name('OwnerForm');
Route::any('/Laporan', [AuthPoinController::class, 'Laporan'])->name('Laporan');
Route::any('/DetailLaporan', [AuthPoinController::class, 'DetailLaporan'])->name('DetailLaporan');

Route::any('/Datalist', [AuthPoinController::class, 'Datalist'])->name('Datalist');

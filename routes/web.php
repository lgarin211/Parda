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
Route::any('/login',[AuthPoinController::class, 'LoginViewPoin'])->name('login');
Route::any('/register',[AuthPoinController::class, 'RegisterViewPoin'])->name('register');
Route::any('/BarangMasuk',[AuthPoinController::class, 'BarangMasuk'])->name('BarangMasuk');
Route::any('/Barang',[AuthPoinController::class, 'Barang'])->name('Barang');

Route::any('/OwenerAccess',[AuthPoinController::class, 'OwenerAccess'])->name('OwenerAccess');

Route::any('/kasir',[AuthPoinController::class, 'kasir'])->name('kasir');
Route::get('/SalesForm', function () {
    return view('Admin/SalesForm');
})->name('SalesForm');
Route::get('/OwnerForm', function () {
    return view('Admin/OwnerForm');
})->name('OwnerForm');

Route::get('/Laporan', function () {
    return view('Owener.Laporan');
})->name('Laporan');

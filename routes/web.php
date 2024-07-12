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
    return view('Templates.InventLayout');
});
Route::any('/login',[AuthPoinController::class, 'LoginViewPoin'])->name('login');
Route::any('/register',[AuthPoinController::class, 'RegisterViewPoin'])->name('register');
Route::any('/Employe',[AuthPoinController::class, 'Employe'])->name('employe');
Route::any('/kasir',[AuthPoinController::class, 'kasir'])->name('kasir');
Route::get('/SalesForm', function () {
    return view('SalesForm');
})->name('SalesForm');
Route::get('/OwnerForm', function () {
    return view('OwnerForm');
})->name('OwnerForm');

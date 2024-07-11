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
Route::any('/login',[AuthPoinController::class, 'LoginViewPoin']);
Route::any('/register',[AuthPoinController::class, 'RegisterViewPoin']);
Route::any('/Employe',[AuthPoinController::class, 'Employe']);

<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/recovery', function () {
    return view('auth/recovery');
});

Route::get('/pay', function () {
    return view('pay');
});

Route::get('/withdraw', function () {
    return view('withdraw');
});


Route::post('login', [LoginController::class, 'store']);
Route::post('register', [RegisterController::class, 'store']);
Route::get('logout', [LogoutController::class, 'store']);
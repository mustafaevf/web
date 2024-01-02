<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/sell/{platform_title?}', function (?string $platform_title = null) {
    return view('sell', ['platform_title' => $platform_title]);
});

Route::get('/platforms/{platform_title?}', function (?string $platform_title = null) {
    return view('platforms', ['platform_title' => $platform_title]);
});

Route::post('login', [LoginController::class, 'store']);
Route::post('register', [RegisterController::class, 'store']);
Route::get('logout', [LogoutController::class, 'store']);
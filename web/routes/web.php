<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/platforms/{platform_title}', [IndexController::class, 'viewPlatforms']);
Route::get('/platforms/{platform_title}/{category}', [IndexController::class, 'viewCategories']);


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

Route::get('/sell', function() {
    if(Auth::user()) {
        return view('sell');
    } else {
        return view('error', ['message' => 'Log in']);
    }
});

// Route::get('/platforms/{platform_title?}', function (?string $platform_title = null) {
//     return view('platforms', ['platform_title' => $platform_title]);
// });

Route::get('/product/{product_id}', function(?string $product_id = null) {
    return view('product', ['product_id' => $product_id]);
});

Route::get('/messages', [MessageController::class, 'viewMessages']);

Route::get('/messages/{user_id}', [MessageController::class, 'index']);

Route::get('/users/{login}', [UserController::class, 'index']);
Route::get('/users/{login}/reviews', [UserController::class, 'reviews']);

Route::get('/product/{product_id}', [ProductController::class, 'index']);
Route::post('/message', [MessageController::class,'sendMessage']);

Route::get('/admin/users', [AdminController::class, 'pageUsers']);
Route::get('/admin/products', [AdminController::class, 'pageProducts']);
Route::get('/admin/categories', [AdminController::class, 'pageCategories']);
Route::get('/admin/platforms', [AdminController::class, 'pagePlatforms']);

Route::post('/admin/editCategory', [AdminController::class,'editCategory']);
Route::post('/admin/addCategory', [AdminController::class,'addCategory']);
Route::post('/admin/deleteCategory', [AdminController::class,'deleteCategory']);
Route::post('/admin/addPlatform', [AdminController::class,'addPlatform']);
Route::post('/admin/deletePlatform', [AdminController::class,'deletePlatform']);
Route::post('/admin/editUser', [AdminController::class, 'editUser']);



Route::post('login', [LoginController::class, 'store']);
Route::post('register', [RegisterController::class, 'store']);
Route::get('logout', [LogoutController::class, 'store']);

Route::post("addProduct", [ProductController::class, "Add"]);


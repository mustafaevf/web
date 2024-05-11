<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Platform;
use App\Http\Controllers\Auth;
use App\Http\Controllers\User;
use App\Http\Controllers\Payment;

Route::prefix('admin')->middleware(['auth', 'admin'])->group( function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/store', Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', Admin\Category\ShowController::class)->name('admin.category.show');
        Route::delete('/{category_id}', Admin\Category\DeleteController::class)->name('admin.category.delete');
    });

    Route::prefix('params')->group(function () {
        Route::delete('/{param_id}', Admin\Param\DeleteController::class)->name('admin.param.delete');
        Route::post('/store', Admin\Param\StoreController::class)->name('admin.param.create');
    });

    Route::prefix('platforms')->group(function() {
        Route::get('/', Admin\Platform\IndexController::class)->name('admin.platform.index');
        Route::get('/create', Admin\Platform\CreateController::class)->name('admin.platform.create');
        Route::post('/store', Admin\Platform\StoreController::class)->name('admin.platform.store');
        Route::get('/{platform}', Admin\Platform\ShowController::class)->name('admin.platform.show');
        Route::delete('/{platform_id}', Admin\Platform\DeleteController::class)->name('admin.platform.delete');
    });
});


Route::prefix('platforms')->group(function() {
    Route::get('/', Platform\IndexController::class)->name('platform.index');
    Route::get('/{platform}', Platform\ShowController::class)->name('platform.show');
});

Route::prefix('auth')->group(function() {
    Route::prefix('register')->group(function () {
        Route::get('/', Auth\Register\IndexController::class)->name('auth.register.index');
        Route::post('/store', Auth\Register\StoreController::class)->name('auth.register.store');
    });
    Route::post('/login', Auth\Login\StoreController::class)->name('auth.login.store');
    Route::get('/logout', Auth\Logout\StoreController::class)->name('auth.logout.store');
    // Route::post('/register', Auth\Register\IndexController::class)->name('auth.register');
});


Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/{user}', User\ShowController::class)->name('user.show');
});

Route::middleware('auth')->group(function() {
    Route::get('/pay', Payment\Pay\IndexController::class)->name('payment.pay');
    Route::get('/withdraw', Payment\Withdraw\IndexController::class)->name('payment.withdraw');    
});



// Route::group(function () {
//     Route::get('/', IndexController::class);
// });
Route::get('/', IndexController::class)->name('index');
// Route::get('/', [IndexController::class, 'index']);
// Route::get('/platforms/{platform_title}', [IndexController::class, 'viewPlatforms']);
// Route::get('/platforms/{platform_title}/{category}', [IndexController::class, 'viewCategories']);


// Route::get('/login', function () {
//     return view('auth/login');
// });

// Route::get('/register', function () {
//     return view('auth/register');
// });

// Route::get('/recovery', function () {
//     return view('auth/recovery');
// });

// Route::get('/pay', function () {
//     return view('pay');
// });

// Route::get('/withdraw', function () {
//     return view('withdraw');
// });

// Route::get('/sell', function() {
//     if(Auth::user()) {
//         return view('sell');
//     } else {
//         return view('error', ['message' => 'Log in']);
//     }
// });
// Route::get('/platforms/{platform_title?}', function (?string $platform_title = null) {
//     return view('platforms', ['platform_title' => $platform_title]);
// });

// Route::get('/product/{product_id}', function(?string $product_id = null) {
//     return view('product', ['product_id' => $product_id]);
// });

// Route::get('/messages', [MessageController::class, 'viewMessages']);

// Route::get('/messages/{user_id}', [MessageController::class, 'index']);

// Route::get('/users/{login}', [UserController::class, 'index']);
// Route::get('/users/{login}/reviews', [UserController::class, 'reviews']);

// Route::get('/product/{product_id}', [ProductController::class, 'index']);
// Route::post('/message', [MessageController::class,'sendMessage']);

// Route::get('/admin/users', [AdminController::class, 'pageUsers']);
// Route::get('/admin/products', [AdminController::class, 'pageProducts']);

// Route::get('/admin/platforms', [AdminController::class, 'pagePlatforms']);
// Route::get('/admin/category/{category_id}', [AdminController::class, 'pageOneCategory']);

// Route::post('/admin/editCategory', [AdminController::class,'editCategory']);
// Route::post('/admin/addCategory', [AdminController::class,'addCategory']);
// Route::post('/admin/deleteCategory', [AdminController::class,'deleteCategory']);
// Route::post('/admin/addPlatform', [AdminController::class,'addPlatform']);
// Route::post('/admin/deletePlatform', [AdminController::class,'deletePlatform']);
// Route::post('/admin/editUser', [AdminController::class, 'editUser']);
// Route::post('/admin/addParam', [AdminController::class, "addParam"]);
// Route::post('/admin/deleteParam', [AdminController::class, "deleteParam"]);

// Route::post('login', [LoginController::class, 'store']);
// Route::post('register', [RegisterController::class, 'store']);
// Route::get('logout', [LogoutController::class, 'store']);

// Route::post("addProduct", [ProductController::class, "Add"]);

// Route::get('/api/getCategories', [ApiController::class, 'getCategories']);

// Route::get('/api/getParams', [ApiController::class, 'getCategories']);
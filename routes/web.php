<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthSystemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\{openController, ProductBidController};


Route::view('call', 'pusher');
// openController is the controller that we created in the previous step to handle the open routes.
Route::get('/', [openController::class, 'index'])->name('users.index');
Route::get('WithCategoriesId/{id}', [openController::class, 'WithCategoriesId'])->name('users.WithCategoriesId');
Route::get('product/{id}', [openController::class, 'productdetail'])->name('users.product');

// after enter click submit bid button then it will go to productbid page
Route::get('productbid/{id}', [openController::class, 'show'])->name('users.productbid');
Route::match(['get', 'post'], 'productbid/{id}', [ProductBidController::class, 'placeBid'])->middleware('auth')->name('users.productbid');



// AuthSystemController is the controller that we created in the previous step to handle the authentication routes.
Route::group(['middleware' => 'guest'], function () {
    Route::match(['get', 'post'], 'register', [AuthSystemController::class, 'registration'])->name('register');
    Route::match(['get', 'post'], 'login', [AuthSystemController::class, 'login'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], 'Deshbord', [AuthSystemController::class, 'Deshbord'])->name('admin_deshbord');
    Route::get('logout', [AuthSystemController::class, 'logout'])->name('logout');
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::match(['get', 'post'], 'Userdeshbord', [AuthSystemController::class, 'Userdeshbord'])->name('user_deshbord');
        Route::get('logout', [AuthSystemController::class, 'logout'])->name('logout');
    });
});
// Route::view('Userdeshbord', 'users.user_deshbord');

require __DIR__ . '/admin.php';
// require __DIR__ . '/user.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthSystemController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('admin.layouts.main');
});
Route::view('index', 'users.index');

// Route::view('register', 'users.layouts.signin');
// Route::get('register', [AuthSystemController::class, 'registration'])
//     ->name('register');
// Route::post('register', [AuthSystemController::class, 'registration'])
//     ->name('register');

Route::group(
    ['middleware' => 'guest'],
    function () {
        Route::match(['get', 'post'], 'register', [AuthSystemController::class, 'registration'])
            ->name('register');
        Route::match(['get', 'post'], 'login', [AuthSystemController::class, 'login'])
            ->name('login');
    }
);

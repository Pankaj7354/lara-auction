<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthSystemController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('admin.index');
// });
Route::view('/', 'users.index');

// Route::view('register', 'users.layouts.signin');
// Route::get('login', [AuthSystemController::class, 'login'])
//     ->name('login');
// Route::post('register', [AuthSystemController::class, 'registration'])
//     ->name('register');

// Route::group(
//     ['middleware' => 'guest'],
//     function () {
Route::match(['get', 'post'], 'register', [AuthSystemController::class, 'registration'])
    ->name('register');
Route::match(['get', 'post'], 'login', [AuthSystemController::class, 'login'])
    ->name('login');
//     }
// );
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::match(['get', 'post'], 'Deshbord', [AuthSystemController::class, 'Deshbord'])
            ->name('admin_deshbord');
        Route::get('logout', [AuthSystemController::class, 'logout']);
    }
);

require __DIR__ . '/admin.php';

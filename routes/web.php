<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthSystemController;
use App\Http\Controllers\UserController;


Route::view('/', 'users.index');
Route::group(['middleware' => 'guest'], function () {
    Route::match(['get', 'post'], 'register', [AuthSystemController::class, 'registration'])->name('register');
    Route::match(['get', 'post'], 'login', [AuthSystemController::class, 'login'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], 'Deshbord', [AuthSystemController::class, 'Deshbord'])->name('admin_deshbord');
    Route::get('logout', [AuthSystemController::class, 'logout']);
});
Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], 'Userdeshbord', [AuthSystemController::class, 'Userdeshbord'])->name('user_deshbord');
    Route::get('logout', [AuthSystemController::class, 'logout']);
});
// Route::view('Userdeshbord', 'users.user_deshbord');

require __DIR__ . '/admin.php';
// require __DIR__ . '/user.php';

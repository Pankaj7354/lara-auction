<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productsController;

Route::resource('category', categoryController::class);
Route::resource('product', productsController::class);

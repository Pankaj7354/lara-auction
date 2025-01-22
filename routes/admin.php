<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;

Route::resource('category', categoryController::class);

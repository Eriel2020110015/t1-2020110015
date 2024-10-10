<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');

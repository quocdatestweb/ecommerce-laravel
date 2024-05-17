<?php

use Illuminate\Support\Facades\Route;
use datnguyen\product\Http\Controllers\ProductController;
use datnguyen\cart\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', [ProductController::class, 'products_user'])->name('products.products_user');

Route::get('/', [ProductController::class, 'products_user'])->name('products.products_user');

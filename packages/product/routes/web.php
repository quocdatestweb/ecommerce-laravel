<?php
use Illuminate\Support\Facades\Route;
use datnguyen\product\Http\Controllers\ProductController;

Route::get('/products_user', [ProductController::class, 'products_user'])->name('products.user');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products_category', [ProductController::class, 'products_category'])->name('products.products_category');
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/', [ProductController::class, 'admin'])->name('products.admin');

// Route::prefix('admin')->middleware('admin')->group(function () {
//  Route::get('/', [ProductController::class, 'admin'])->name('products.admin');
//     Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
//     Route::post('/products/delete/{id}', [ProductController::class, 'destroy']);
//     Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
//     Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
//     Route::post('/products', [ProductController::class, 'store'])->name('products.store');
//     Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
//     Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// });



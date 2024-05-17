<?php
use Illuminate\Support\Facades\Route;
use datnguyen\product\Http\Controllers\ProductController;
use datnguyen\admin\Http\Controllers\AdminController;
use datnguyen\post\Http\Controllers\PostController;
use datnguyen\cart\Http\Controllers\CartController;

Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products/delete/{id}', [ProductController::class, 'destroy']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::group(['prefix'=>'admin'],function (){

    Route::group(['middleware'=>'admin.auth'], function(){
        Route::get('/products_admin', [ProductController::class, 'admin'])->name('admin.admin');
        Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.destroy');
        Route::post('/products/delete/{id}', [ProductController::class, 'destroy']);
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.update');
        Route::post('/products', [ProductController::class, 'store'])->name('admin.store');
        // Route::get('/products', [ProductController::class, 'index'])->name('admin.index');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('admin.shows');
        Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/add', [AdminController::class, 'add'])->name('admin.add');
        Route::post('/add', [ProductController::class, 'store'])->name('admin.store');

        Route::get('/addpost', [AdminController::class, 'addpost'])->name('admin.addpost');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/listpost', [AdminController::class, 'listpost'])->name('admin.listpost');
        Route::get('/cart/details', [CartController::class, 'showOrderDetails'])->name('cart.details');
        Route::get('/viewdetail/{id}', [CartController::class, 'viewdetail'])->name('admin.viewdetail');

 });
});


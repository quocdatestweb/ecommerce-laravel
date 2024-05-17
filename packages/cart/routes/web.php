<?php
use Illuminate\Support\Facades\Route;
use datnguyen\cart\Http\Controllers\CartController;

// Route definition
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/checkout', [CartController::class, 'checkOut'])->name('cart.checkout');
Route::post('/cart/placeorder', [CartController::class, 'placeOrder'])->name('cart.placeorder');

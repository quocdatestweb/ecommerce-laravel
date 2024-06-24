<?php
use Illuminate\Support\Facades\Route;
use datnguyen\user\Http\Controllers\UserController;

// Route::get('/register', [UserController::class, 'register'])->name('user.register');
// Route::post('/register', [UserController::class, 'registerPost'])->name('user.register');

// Route::get('/login', [UserController::class, 'login'])->name('user.login');

// // Route::post('/register', [UserController::class, 'registerPost'])->name('user.register');
// Route::post('/logins', [UserController::class, 'loginPost'])->name('user.logins');
// // Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::get('email/confirm/{token}', [UserController::class, 'confirmEmail'])->name('confirm');

Route::group(['prefix'=>'account'],function (){
    Route::group(['middleware'=>'admin.guest'], function(){
        Route::get('/login', [UserController::class, 'login'])->name('user.login');
        Route::post('/register', [UserController::class, 'registerPost'])->name('user.register');
        Route::get('/register', [UserController::class, 'register'])->name('user.register');
        Route::post('/login', [UserController::class, 'authenticate'])->name('user.logins');
    });
    
});

Route::group(['prefix'=>'user'],function (){
    Route::group(['middleware'=>'admin.guest'], function(){
        Route::get('/wheel', [UserController::class, 'wheel'])->name('user.wheel');
        Route::post('/spin', [UserController::class, 'spin'])->name('user.spin');
        Route::get('/spins-left',[UserController::class, 'getSpinsLeft'])->name('user.spins-left');
        Route::post('/save-gift',[UserController::class, 'saveGift'])->name('user.save-gift');
        Route::match(['get', 'post'], '/viewsprize', [UserController::class, 'viewsprize'])->name('user.viewsprize');
   
});
    
});
     

     

    Route::group(['middleware'=>'admin.auth'], function(){
        Route::get('/logout', [UserController::class, 'logoutPost'])->name('user.logoutPost');

    });


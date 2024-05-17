<?php
use Illuminate\Support\Facades\Route;
use datnguyen\post\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.user');

// // Post routes
// Route::prefix('admin')->middleware('admin')->group(function (){
//     Route::get('/posts', [PostController::class, 'postadmin'])->name('posts.admin');
//     Route::get('/posts/{id}', [PostController::class, 'show'])->name('showpost');
//     Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
//     Route::post('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
//     Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
//     Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('posts.update');
//     Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// });
Route::group(['prefix'=>'admin'],function (){

    Route::group(['middleware'=>'admin.auth'], function(){
        Route::get('/posts', [PostController::class, 'postadmin'])->name('posts.admin');
        Route::get('/posts_index', [PostController::class, 'postadmin'])->name('posts.index');
        Route::get('/posts/{id}', [PostController::class, 'show'])->name('showpost');
        Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::post('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroys');
        Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('posts.update');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    });
});

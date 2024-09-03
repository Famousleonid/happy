<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "clean Ok";
});

Route::get('/', [MainController::class, 'index'])->name('home');
Route::resource('/card', CardController::class);

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::get('/main', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/product', ProductController::class);
    Route::resource('/category', CategoryController::class);
    Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

});

<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin.index');



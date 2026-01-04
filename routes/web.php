<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'loginForm'])->name('login.form');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');

    Route::get('register', [AdminAuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [AdminAuthController::class, 'register'])->name('register.submit');

   
    Route::get('dashboard', [AdminDashboardController::class,'getDashboardData'])->middleware('auth:admin');
    
});

Route::prefix('customer')->group(function () {
    Route::get('login', [CustomerAuthController::class, 'loginForm']);
    Route::post('login', [CustomerAuthController::class, 'login']);

    Route::get('dashboard', [CustomerDashboardController::class,'getDashboardData'])->middleware('auth:customer');
    
});

Route::middleware('auth:admin')->group(function () {
    Route::resource('products', ProductController::class);
});


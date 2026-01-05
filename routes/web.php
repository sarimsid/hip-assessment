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
    Route::get('login', [AdminAuthController::class, 'loginForm'])->name('admin.login.form');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('register', [AdminAuthController::class, 'registerForm'])->name('admin.register.form');
    Route::post('register', [AdminAuthController::class, 'register'])->name('admin.register.submit');

   
    Route::get('dashboard', [AdminDashboardController::class,'getDashboard'])->name('admin.dashboard')->middleware('auth:admin');
    // Route::get('dashboard', [AdminDashboardController::class,'getDashboard'])->middleware('auth:admin');
    
});

Route::prefix('customer')->group(function () {
    Route::get('login', [CustomerAuthController::class, 'loginForm'])->name('customer.login.form');
    Route::post('login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');
    Route::post('logout', [CustomerAuthController::class, 'logout'])->name('custoemer.logout');

    Route::get('register', [CustomerAuthController::class, 'registerForm'])->name('customer.register.form');
    Route::post('register', [CustomerAuthController::class, 'register'])->name('customer.register.submit');

    Route::get('dashboard', [CustomerDashboardController::class,'getDashboardData'])->name('customer.dashboard')->middleware('auth:customer');
    
});

Route::middleware('auth:admin')->group(function () {
    Route::resource('products', ProductController::class);
});


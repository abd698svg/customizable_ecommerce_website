<?php

use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminLoginController::class, 'create'])
->name('admin.login.form');

Route::post('/admin/login', [AdminLoginController::class, 'store'])
->name('admin.login');

Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['AdminProtectMiddleware'])->group(function () {
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::get('/products/{product}/edit-data', [App\Http\Controllers\Admin\ProductController::class, 'editData'])->name('products.edit-data');
});

/*
GET `/register` → `AuthController@showRegisterForm` (name: `register`)      
POST `/register` → `AuthController@register`      
GET `/login` → `AuthController@showLoginForm` (name: `login`)      
POST `/login` → `AuthController@login`      
POST `/logout` → `AuthController@logout` (name: `logout`)      
GET `/forgot-password` → `AuthController@showForgotForm` (name: `password.request`)      
POST `/forgot-password` → `AuthController@sendResetLink` (name: `password.email`)      
GET `/reset-password/{token}` → `AuthController@showResetForm` (name: `password.reset`)      
POST `/reset-password` → `AuthController@reset` (name: `password.update`)
*/
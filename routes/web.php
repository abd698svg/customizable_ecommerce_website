<?php

use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminLoginController::class, 'create'])
->name('admin.login.form');

Route::post('/admin/login', [AdminLoginController::class, 'store'])
->name('admin.login');

Route::get('/welcome', [AdminLoginController::class, 'createWelcome'])
->middleware(['AdminProtectMiddleware']);
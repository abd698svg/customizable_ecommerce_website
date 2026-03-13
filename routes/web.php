<?php

use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminLoginController::class, 'create'])
->name('admin.login.form')
->middleware('AdminProtectMiddleware');

Route::post('/admin/login', [AdminLoginController::class, 'store'])
->name('admin.login')
->middleware('AdminProtectMiddleware');


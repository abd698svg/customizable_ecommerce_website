<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  // return view('/admin');
////}); // <-- يجب إغلاق الدالة هنا

/*Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
});*/
Route::prefix('admin')->group(function () {
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::get('/products/{product}/edit-data', [App\Http\Controllers\Admin\ProductController::class, 'editData'])->name('products.edit-data');

});
//Route::get('/products/{product}/edit-data', [App\Http\Controllers\Admin\ProductController::class, 'editData'])->name('products.edit-data');



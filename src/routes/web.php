<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products',[ProductController::class,'index']);

Route::get('/products/search',[ProductController::class,'search']);
Route::get('/products/register',[ProductController::class,'add']);
Route::post('/products',[ProductController::class,'store']);
Route::get('/products/{productId}',[ProductController::class,'show'])->name('products.detail');
Route::patch('/products/{productId}/update',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{productId}/delete',[ProductController::class,'destroy'])->name('products.delete');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

// //route resource for products
// Route::resource('/products', \App\Http\Controllers\ProductController::class);

Route::get('/', [ProductController::class, 'index']);

//route resource for products
Route::resource('products', ProductController::class);
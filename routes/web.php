<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);

Route::get( 'products', [\App\Http\Controllers\ProductController::class, 'index'])->name('list_products');
// Route::get('products/all', [\App\Http\Controllers\ProductController::class, 'index'])->name('list_products');
Route::get( 'products/detail/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('show_products');
Route::get('products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create_products')->middleware('auth', 'isadmin');
Route::post('products/create', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('products/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit_products')->middleware('auth', 'isadmin');
Route::post( 'products/edit/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->middleware('auth', 'isadmin');
Route::get('products/destroy/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy_products')->middleware('auth', 'isadmin');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

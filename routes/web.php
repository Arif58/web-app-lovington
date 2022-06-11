<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\LoginController;
use  App\Http\Controllers\ProductController;
use  App\Http\Controllers\OrdersController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'log']);

//category
Route::get('/category', [CategoryController::class, 'index']);

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/category/edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');

Route::post('/category/update/{category_id}', [CategoryController::class, 'update'])->name('category.update');

Route::post('/category/{category_id}', [CategoryController::class, 'destroy'])->name('category.destroy');

//product
Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/edit/{product_id}/{category_id}', [ProductController::class, 'edit'])->name('product.edit');

Route::post('/product/update/{product_id}', [ProductController::class, 'update'])->name('product.update');

Route::post('/product/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/order', [OrdersController::class, 'index']);

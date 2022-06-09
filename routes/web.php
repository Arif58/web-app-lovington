<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CategoryController;
use  App\Http\Controllers\LoginController;
use  App\Http\Controllers\ProductController;
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
Route::delete('/category/{category_id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');

Route::get('/product', [ProductController::class, 'index']);

<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/home', function () {
    return view('index-product');
});

Auth::routes();

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/', [ProductController::class, 'index_product'])->name('index-product');
Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show-product');
Route::post('/store/message', [MessageController::class, 'store_message'])->name('store-message');
Route::get('/about', [CompanyController::class, 'index_about'])->name('index-about');


Route::middleware(['admin'])->group(function () {
    Route::get('/product', [ProductController::class, 'index_data'])->name('index-data');
    Route::patch('/product/{product}/update', [ProductController::class, 'update_data'])->name('update-data');
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete-product');
    Route::delete('/order/{message}', [MessageController::class, 'delete_order'])->name('delete-order');
    Route::post('/store/products', [ProductController::class, 'store_product'])->name('store-product');
    Route::get('/company', [CompanyController::class, 'index_company'])->name('index-company');
    Route::get('/orders', [MessageController::class, 'index_order'])->name('index-order');
    Route::get('/profile', [ProfileController::class, 'index_profile'])->name('index-profile');
    Route::post('/store/company', [CompanyController::class, 'store_company'])->name('store-company');
    Route::post('/profile', [ProfileController::class, 'update_profile'])->name('update-profile');
});
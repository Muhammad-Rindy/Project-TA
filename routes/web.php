<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::get('/create-company', [CompanyController::class, 'create_company'])->name('create-company');


Route::middleware(['admin'])->group(function() {
    Route::post('/store/products', [ProductController::class, 'store_product'])->name('store-product');
    Route::post('/store/company', [CompanyController::class, 'store_company'])->name('store-company');
    });
<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/product', App\Http\Livewire\Product\Index::class)->middleware('auth')->name('admin.product');

Route::get('/shop', App\Http\Livewire\Shop\Index::class)->name('shop.index');
Route::get('/cart', App\Http\Livewire\Shop\Cart::class)->name('shop.cart');
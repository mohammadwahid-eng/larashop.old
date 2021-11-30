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

Route::view('/', 'index');
Route::view('/shop', 'products.list.index')->name('shop');
Route::view('/cart', 'cart.index')->name('cart');
Route::view('/checkout', 'checkout.index')->name('checkout');
Route::view('/compare', 'compare.index')->name('compare');
Route::view('/wishlist', 'wishlist.index')->name('wishlist');
Route::view('/terms-of-services', 'wishlist.index')->name('terms');
Route::view('/privacy-policy', 'wishlist.index')->name('privacy');

require __DIR__.'/auth.php';
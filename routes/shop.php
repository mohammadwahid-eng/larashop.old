<?php

use Illuminate\Support\Facades\Route;

Route::view('/shop', 'products.list.index')->name('shop');
Route::view('/cart', 'cart.index')->name('cart');
Route::view('/checkout', 'checkout.index')->name('checkout');
Route::view('/compare', 'compare.index')->name('compare');
Route::view('/wishlist', 'wishlist.index')->name('wishlist');
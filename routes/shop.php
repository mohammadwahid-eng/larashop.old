<?php

use Illuminate\Support\Facades\Route;

Route::view('/shop', 'products.list.index')->name('shop');
Route::view('/cart', 'cart.index')->name('cart');
Route::view('/checkout', 'checkout.index')->name('checkout');
Route::view('/compare', 'compare.index')->name('compare');
Route::view('/wishlist', 'wishlist.index')->name('wishlist');

Route::prefix('customer')->middleware(['verified', 'theme:default'])->group(function() {
    Route::view('/', 'customer.index')->name('customer.home');
    Route::view('/orders', 'customer.orders.index')->name('customer.orders');
    Route::view('/downloads', 'customer.downloads.index')->name('customer.downloads');
    Route::view('/addresses', 'customer.addresses.index')->name('customer.addresses');
    Route::view('/payment-methods', 'customer.payment-methods.index')->name('customer.payment_methods');
    Route::view('/account', 'customer.account.index')->name('customer.account');
});
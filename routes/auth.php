<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\ProductAttributeValueController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTagController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->name('customer.')->middleware(['theme:default'])->group(function() {

    Route::middleware(['guest'])->group(function () {
        Route::get('/registration', [RegisteredUserController::class, 'create'])->name('registration');
        Route::post('/registration', [RegisteredUserController::class, 'store']);

        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::middleware(['verified'])->group(function() {
            Route::view('/', 'customer.index')->name('home');
            Route::view('/orders', 'customer.orders.index')->name('orders');
            Route::view('/downloads', 'customer.downloads.index')->name('downloads');
            Route::view('/addresses', 'customer.addresses.index')->name('addresses');
            Route::view('/payment-methods', 'customer.payment-methods.index')->name('payment_methods');
            Route::view('/account', 'customer.account.index')->name('account');
        });

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });

});


Route::prefix('admin')->name('admin.')->middleware(['theme:admin'])->group(function() {

    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/registration', [RegisteredUserController::class, 'create'])->name('registration');
        Route::post('/registration', [RegisteredUserController::class, 'store']);

        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::middleware(['verified'])->group(function() {
            Route::view('/', 'dashboard.index')->name('home');
            Route::prefix('catalogue')->group(function() {
                Route::delete('/categories/bulk', [ProductCategoryController::class, 'destroy_bulk'])->name('categories.destroy.bulk');
                Route::resource('categories', ProductCategoryController::class);

                Route::delete('/tags/bulk', [ProductTagController::class, 'destroy_bulk'])->name('tags.destroy.bulk');
                Route::resource('tags', ProductTagController::class);
                
                Route::delete('/attributes/bulk', [ProductAttributeController::class, 'destroy_bulk'])->name('attributes.destroy.bulk');
                Route::resource('attributes', ProductAttributeController::class);

                Route::delete('/attributes/{attribute}/values/bulk', [ProductAttributeValueController::class, 'destroy_bulk'])->name('attributes.values.destroy.bulk');
                Route::resource('attributes.values', ProductAttributeValueController::class);

                Route::delete('/products/bulk', [ProductController::class, 'destroy_bulk'])->name('products.destroy.bulk');
                Route::resource('products', ProductController::class);
            });

            Route::prefix('settings')->name('settings.')->group(function() {
                Route::get('/', [SettingController::class, 'index'])->name('index');
                Route::put('/', [SettingController::class, 'update'])->name('update');
            });
        });

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });

});





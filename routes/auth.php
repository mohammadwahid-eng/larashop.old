<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware(['theme:default'])->group(function() {

    Route::middleware(['guest'])->group(function () {
        Route::get('/registration', [RegisteredUserController::class, 'create'])->name('customer.registration');
        Route::post('/registration', [RegisteredUserController::class, 'store']);

        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('customer.login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('customer.password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('customer.password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('customer.password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('customer.password.update');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('customer.verification.notice');
        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('customer.verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('customer.verification.send');

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('customer.password.confirm');
        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('customer.logout');
    });

});


Route::prefix('admin')->middleware(['theme:admin'])->group(function() {

    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/registration', [RegisteredUserController::class, 'create'])->name('admin.registration');
        Route::post('/registration', [RegisteredUserController::class, 'store']);

        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('admin.verification.send');

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::middleware(['verified'])->group(function () {
            Route::view('/', 'home')->name('admin.home');
        });

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    });

});





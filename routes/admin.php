<?php

use App\Http\Controllers\Admin\AdminAuthController;

Route::prefix('admin')->group(function () {

    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.post-login');
    });
    
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::middleware('check.logout')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.pages.dashboard');
        })->name('admin.dashboard');
    });

    Route::middleware('permission:manage_users')->group(function () {
        Route::get('/users', function () {
            return;
        })->name('admin.users.index');
    });

});


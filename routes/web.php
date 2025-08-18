<?php

use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\AuthController;
use App\Http\Controllers\Clients\ForgotPasswordController;
use App\Http\Controllers\Clients\ResetPasswordController;
use App\Http\Controllers\Clients\SupportController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\CartController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('clients.pages.about');
})->name('about');

    Route::middleware('guest')->group(function(){
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('post-register');

        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('post-login');
        
        Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
    });


Route::get('/activate/{token}',[AuthController::class, 'activate'])->name('activate');




Route::middleware('check.logout')->group(function() {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('/account')->group(function() {
       Route::get('/', [AccountController::class, 'index'])->name('account');
       Route::put('/update', [AccountController::class, 'update'])->name('account.update');
       Route::post('/change-password', [AccountController::class, 'changePassword'])->name('account.change-password');

       Route::post('/addresses', [AccountController::class, 'addAddress'])->name('account.addresses.add');

       Route::put('/addresses/{id}', [AccountController::class, 'updatePrimaryAddress'])->name('account.addresses.update');
       Route::delete('/addresses/{id}', [AccountController::class, 'deleteAddress'])->name('account.addresses.delete');


   });
});


Route::get('/products', [ProductController::class, 'index'])->name('products.index');


// Detail product
Route::get('/products/{slug}', [ProductController::class, 'detail'])->name('products.detail');

// Cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/mini-cart', [CartController::class, 'loadMiniCart'])->name('cart.mini');
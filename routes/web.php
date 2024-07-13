<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MerchantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', [LoginController::class, 'index']);

Auth::routes();

// Route untuk pengguna setelah login
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route untuk Merchant
    Route::group(['middleware' => 'role:merchant'], function () {
        Route::get('/merchant/dashboard', [MerchantController::class, 'index'])->name('merchant.dashboard');
        Route::get('/merchant/menu', [MerchantController::class, 'menu'])->name('merchant.menu');
        Route::get('/merchant/prderan', [MerchantController::class, 'menu'])->name('merchant.orderan');
        Route::get('/merchant/profile', [MerchantController::class, 'profile'])->name('merchant.profile');
    });

    // Route untuk Customer
    Route::group(['middleware' => 'role:customer'], function () {
        Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth', 'role:merchant']], function () {
//     // echo "merchan";
//     Route::get('/merchant/dashboard', [MerchantController::class, 'index'])->name('merchant.dashboard');
// });

// Route::group(['middleware' => ['auth', 'role:customer']], function () {
//     // echo "Customer";

//     Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

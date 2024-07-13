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
        Route::get('/merchant/create', [MerchantController::class, 'create_merchant'])->name('merchant.create');
        Route::post('/merchant/create', [MerchantController::class, 'store_merchant'])->name('merchant.store');
        Route::get('/merchant/menu', [MerchantController::class, 'menu'])->name('merchant.menu');
        Route::get('/merchant/menu/create', [MerchantController::class, 'create_menu'])->name('merchant.create_menu');
        Route::get('/merchant/menu/{id}', [MerchantController::class, 'edit_menu'])->name('merchant.edit_menu');
        Route::put('/merchant/menu/{id}', [MerchantController::class, 'update_menu'])->name('merchant.update_menu');
        Route::post('/merchant/menu/create', [MerchantController::class, 'store_menu'])->name('merchant.store_menu');
        Route::delete('/merchant/menu/{id}', [MerchantController::class, 'destroy_menu'])->name('merchant.destroy_menu');
        Route::get('/merchant/prderan', [MerchantController::class, 'menu'])->name('merchant.orderan');
        Route::get('/merchant/profile', [MerchantController::class, 'profile'])->name('merchant.profile');
    });

    // Route untuk Customer
    Route::group(['middleware' => 'role:customer'], function () {
        Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
        Route::get('/customer/menu', [CustomerController::class, 'menu'])->name('customer.menu');
        Route::get('/customer/prderan', [CustomerController::class, 'menu'])->name('customer.orderan');
        Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
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

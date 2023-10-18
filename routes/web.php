<?php

// use auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    return view('login');
});







Route::post('register', [UserController::class, 'actionregister'])->name('actionregister');
Route::get('register', [UserController::class, 'register'])->name('register');


Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login_action');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::middleware('auth')->group( function () {

    Route::get('adminhome', [AdminController::class, 'adminhome'])->name('adminhome');
    Route::get('actionstatus', [AdminController::class, 'actionstatus'])->name('actionstatus');
    Route::get('order/{id}', [AdminController::class, 'adminshow'])->name('adminshow');
    Route::get('orderproses', [ProductController::class, 'orderproses'])->name('orderproses');
    Route::get('orderkirim', [ProductController::class, 'orderkirim'])->name('kirim');
    Route::get('food/{s_query}', [ProductController::class, 'product'])->name('food');
    Route::get('drink/{s_query}', [ProductController::class, 'productdrink'])->name('drink');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::post('remove-from-cart/{id}', [ProductController::class, 'remove'])->name('remove.from.cart');
    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::post('remove-from-cart/{id}', [ProductController::class, 'remove'])->name('remove.from.cart');
    Route::get('search/{status?}/{show_result?}/{s_query?}}', [ProductController::class, 'product'])->name('search');
    Route::get('products/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('favourite', [ProductController::class, 'favourite'])->name('favourite');
    Route::get('add-to-favourite/{id}', [ProductController::class, 'addTofavourite'])->name('add.to.favourite');
    Route::post('remove-from-favourite/{id}', [ProductController::class, 'removefavourite'])->name('remove.from.favourite');
    Route::get('search/{status?}/{show_result?}/{s_query?}}', [ProductController::class, 'product'])->name('search');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    // Route::get('editProfile', [UserController::class, 'editProfile'])->name('editProfile');
    Route::get('profil', [userController::class, 'tampilkanProfil'])->name('profil');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('prosescheckout', [ProductController::class, 'addtocheckout'])->name('prosescheckout');
    Route::post('profile', [UserController::class, 'user_profile'])->name('user_profile');
    Route::get('checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::get('addtocheckout/{id}', [ProductController::class, 'addtocheckout'])->name('addtocheckout');

    //Order Proses
    Route::get('orderproses', [ProductController::class, 'orderproses'])->name('orderproses');
    //Order Di Kirim
    Route::get('orderkirim', [ProductController::class, 'orderkirim'])->name('kirim');
    Route::get('addtoselesai/{id}', [ProductController::class, 'addtoselesai'])->name('addtoselesai');
    //Order Batal
    Route::get('addtobatal/{id}', [ProductController::class, 'addtobatal'])->name('addtobatal');
    Route::get('orderbatal', [ProductController::class, 'orderbatal'])->name('orderbatal');
    //Order Selesai
    Route::get('orderselesai', [ProductController::class, 'orderselesai'])->name('orderselesai');
    //Admin Show
    Route::get('order/{id}', [AdminController::class, 'adminshow'])->name('adminshow');
});







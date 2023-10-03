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
//register 
Route::post('register', [UserController::class, 'actionregister'])->name('actionregister');
Route::get('register', [UserController::class, 'register'])->name('register');
// login
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login_action');
// login admin
Route::get('loginadmin', [AdminController::class, 'loginadmin'])->name('loginadmin');
Route::post('loginadmin', [AdminController::class, 'login_actionadmin'])->name('login_actionadmin');
// change password old
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
 //change password
 Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
 Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
 Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
 Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::middleware('auth')->group( function () {
    // View Admin
    Route::get('adminhome', [AdminController::class, 'adminhome'])->name('adminhome');
    Route::get('actionstatus', [AdminController::class, 'actionstatus'])->name('actionstatus');
    // Cara menampilkan data user
    Route::post('profile', [UserController::class, 'user_profile'])->name('user_profile');
    // logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('home', [UserController::class, 'home'])->name('home');
    // view profil
    Route::get('profil', [userController::class, 'tampilkanProfil'])->name('profil');
    //view food and drink
    Route::get('food/{s_query}', [ProductController::class, 'product'])->name('food');
    Route::get('drink/{s_query}', [ProductController::class, 'productdrink'])->name('drink');
    // edit profil
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile', [UserController::class, 'user_profile'])->name('user_profile');
    //keranjang
    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
    Route::post('remove-from-cart/{id}', [ProductController::class, 'remove'])->name('remove.from.cart');
    //favorit
    Route::get('favourite', [ProductController::class, 'favourite'])->name('favourite');
    Route::get('add-to-favourite/{id}', [ProductController::class, 'addTofavourite'])->name('add.to.favourite');
    Route::post('remove-from-favourite/{id}', [ProductController::class, 'removefavourite'])->name('remove.from.favourite');
    //detail produk
    Route::get('products/{id}', [ProductController::class, 'show'])->name('show');
    //search
    Route::get('search/{status?}/{show_result?}/{s_query?}}', [ProductController::class, 'product'])->name('search');
    Route::get('hasil', [ProductController::class, 'hasil'])->name('hasil');
    });
    //checkout
    Route::get('checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::get('addtocheckout/{id}', [ProductController::class, 'addtocheckout'])->name('addtocheckout');
    //Order Proses
    Route::get('orderproses', [ProductController::class, 'orderproses'])->name('orderproses');
    //Order Di Kirim
    Route::get('orderkirim', [ProductController::class, 'orderkirim'])->name('kirim');
    //Order Batal
    Route::get('orderbatal', [ProductController::class, 'orderbatal'])->name('orderbatal');
    //Admin Show
    Route::get('order/{id}', [AdminController::class, 'adminshow'])->name('adminshow');
    //Status POST
    // Route::post('adminhome', [AdminController::class, 'actionstatus'])->name('actionstatus');










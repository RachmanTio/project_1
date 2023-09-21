<?php

// use auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('food', [UserController::class, 'food'])->name('food');
Route::get('drink', [UserController::class, 'drink'])->name('drink');
Route::post('register', [UserController::class, 'actionregister'])->name('actionregister');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login_action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('profil', [userController::class, 'tampilkanProfil'])->name('profil');
Route::get('food', [ProductController::class, 'product'])->name('food');
Route::get('drink', [ProductController::class, 'productdrink'])->name('drink');
// Route::get('home', [UserController::class, 'home'])->name('home');
Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('profile', [UserController::class, 'user_profile'])->name('user_profile');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::post('remove-from-cart/{id}', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::middleware('auth')->group( function () {
    Route::post('profile', [UserController::class, 'user_profile'])->name('user_profile');
    Route::get('home', [UserController::class, 'home'])->name('home');
});






<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Models\User;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Route::post('forget-password', [RegisterController::class, 'forgetpassword']);


Route::get('drink', [ProductController::class, 'drink_action']);
Route::get('edit_profil', [RegisterController::class, 'user_profile']);
Route::get('data_profil', [UserController::class, 'profil']);
Route::get('userlist', [UserController::class, 'index']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('password_action', [RegisterController::class, 'password_action']);
Route::post('login', [RegisterController::class, 'login']);
Route::middleware('auth:api')->group( function () {
    // Route::get('userlist', [UserController::class, 'index']);
    Route::get('data_profil', [UserController::class, 'profil']);
    Route::post('user_profile', [RegisterController::class, 'user_profile']);
    Route::post('produk', [ProductController::class, 'produk_action']);
    Route::post('favourite', [ProductController::class, 'favourite_action']);
    Route::get('drink', [ProductController::class, 'drink_action']);
    Route::get('food', [ProductController::class, 'food_action']);
    Route::post('hapus', [ProductController::class, 'hapus_action']);
    Route::post('remove_proses', [ProductController::class, 'hapus_proses']);
    Route::post('delete', [ProductController::class, 'delete_action']);
    Route::get('search', [ProductController::class, 'pencarian']);
    Route::post('token', [UserController::class, 'logout_action']);
    Route::post('checkout_barang', [ProductController::class, 'checkout']);
    Route::post('selamat', [ProductController::class, 'selesai']);
    Route::post('cancel', [ProductController::class, 'batal']);
    Route::get('data_favorit', [ProductController::class, 'datafavoritcuyy']);
    Route::get('data_cart', [ProductController::class, 'cart']);
    Route::get('admin', [ProductController::class, 'data_proses']);
    Route::get('admin2', [ProductController::class, 'data_dikirim']);
    Route::get('admin3', [ProductController::class, 'data_batal']);
    Route::get('admin4', [ProductController::class, 'data_selesai']);
    Route::get('harga', [ProductController::class, 'total']);
    Route::get('invoice', [UserController::class, 'invoice_cuyyy']);
    Route::get('cetak', [UserController::class, 'cetak_file']);
    


});

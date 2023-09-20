<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RegisterController;

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

});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth関連
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dish/{dish_id?}', [App\Http\Controllers\DishController::class, 'show'])->name('dish.show');
Route::get('/favorite', [App\Http\Controllers\FavoriteController::class, 'show'])->name('favorite.show');
Route::post('/favorite', [App\Http\Controllers\FavoriteController::class, 'add'])->name('favorite.add');
Route::get('/map', [App\Http\Controllers\MapController::class, 'show'])->name('map.show');


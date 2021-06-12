<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

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
Route::get('/home/area', [App\Http\Controllers\HomeController::class, 'area'])->name('area');
Route::get('/home/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::post('/home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('/dish/{dish_id?}', [App\Http\Controllers\DishController::class, 'show'])->name('dish.show');
Route::get('/favorite', [App\Http\Controllers\FavoriteController::class, 'show'])->name('favorite.show');
Route::put('/favorite/{dish_id}/add', [App\Http\Controllers\FavoriteController::class, 'add'])->name('favorite.add');
Route::delete('/favorite/{dish_id}/delete', [App\Http\Controllers\FavoriteController::class, 'delete'])->name('favorite.remove');
Route::get('/map', [App\Http\Controllers\MapController::class, 'show'])->name('map.show');

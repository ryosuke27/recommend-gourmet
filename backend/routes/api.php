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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dish/{dish_id?}', [App\Http\Controllers\DishController::class, 'show'])->name('dish.show');
Route::get('/favorite', [App\Http\Controllers\FavoriteController::class, 'show'])->name('favorite.show');
Route::get('/map', [App\Http\Controllers\MapController::class, 'show'])->name('map.show');


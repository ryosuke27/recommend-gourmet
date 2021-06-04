<?php

use Illuminate\Support\Facades\Route;

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


// Auth::routes();

Route::get('/{any}', function() {
  return view('layouts.app');
})->where('any', '.*');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/dish/{dish_id}', [App\Http\Controllers\DishController::class, 'show'])->name('dish.show');
Route::get('/favorite', [App\Http\Controllers\FavoriteController::class, 'show'])->name('favorite.show');
Route::get('/map', [App\Http\Controllers\MapController::class, 'show'])->name('map.show');

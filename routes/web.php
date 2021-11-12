<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingbasketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('publisher', PublisherController::class);
Route::resource('author', AuthorController::class);
Route::resource('book', BookController::class);
Route::resource('warehouse', WarehouseController::class);
Route::resource('customer', CustomerController::class);
Route::resource('shoppingbasket', ShoppingbasketController::class);

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

//serve with "php -S localhost:8000 -t public"


//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    dd(File::get(public_path('css/app.css')));
//});

Route::get('/', [BookController::class, 'index']);

Route::resource('publishers', PublisherController::class);
Route::resource('authors', AuthorController::class);

Route::resource('books', BookController::class);
Route::resource('warehouses', WarehouseController::class);
Route::resource('customers', CustomerController::class);
Route::resource('shoppingbaskets', ShoppingbasketController::class);

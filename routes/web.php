<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\WarehousesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ShoppingbasketsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('publishers', PublishersController::class);
Route::resource('authors', AuthorsController::class);
Route::resource('books', BooksController::class);
Route::resource('warehouses', WarehousesController::class);
Route::resource('customers', CustomersController::class);
Route::resource('shoppingbaskets', ShoppingbasketsController::class);

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

Route::get('/', [BookController::class, 'index']);

Route::resource('publishers', PublisherController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('warehouses', WarehouseController::class);
Route::resource('customers', CustomerController::class);
// Route::resource('shoppingbaskets', ShoppingbasketController::class);

Route::get('cart', [ShoppingbasketController::class, 'cartList'])->name('cart.list');
Route::post('cart', [ShoppingbasketController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [ShoppingbasketController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [ShoppingbasketController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [ShoppingbasketController::class, 'clearAllCart'])->name('cart.clear');

<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

//users
Route::get('users', [UsersController::class, 'users_index']);
Route::get('add_user', [UsersController::class, 'user_add']);
Route::post('users/add_user', [UsersController::class, 'user_store']);
Route::get('users/{id}/edit', [UsersController::class, 'user_edit']);
Route::put('users/{id}/update_user', [UsersController::class, 'user_update']);
Route::get('users/{id}/delete', [UsersController::class, 'user_delete']);
Route::get('users/{id}/profile', [UsersController::class, 'user_profile']);

//Products
Route::get('products', [ProductsController::class, 'products_index']);
Route::get('Products/add', [ProductsController::class, 'product_add']);
Route::post('products/add_product', [ProductsController::class, 'product_store']);
Route::post('products/filter', [ProductsController::class, 'product_filter']);

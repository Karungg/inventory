<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReturnProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/products-in', [ProductInController::class, 'index']);
Route::get('/products-in/{id}', [ProductInController::class, 'show']);
Route::post('/products-in', [ProductInController::class, 'store']);
Route::put('/products-in/{id}', [ProductInController::class, 'update']);
Route::delete('/products-in/{id}', [ProductInController::class, 'destroy']);

Route::get('/products-out', [ProductOutController::class, 'index']);
Route::get('/products-out/{id}', [ProductOutController::class, 'show']);
Route::post('/products-out', [ProductOutController::class, 'store']);
Route::put('/products-out/{id}', [ProductOutController::class, 'update']);
Route::delete('/products-out/{id}', [ProductOutController::class, 'destroy']);

Route::get('/returns-product', [ReturnProductController::class, 'index']);
Route::get('/returns-product/{id}', [ReturnProductController::class, 'show']);
Route::post('/returns-product', [ReturnProductController::class, 'store']);
Route::put('/returns-product/{id}', [ReturnProductController::class, 'update']);
Route::delete('/returns-product/{id}', [ReturnProductController::class, 'destroy']);

Route::get('/users/{id}', [ProfileController::class, 'index']);
Route::put('/users/{id}', [ProfileController::class, 'updateUser']);

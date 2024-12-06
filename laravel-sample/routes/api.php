<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::middleware('auth:sanctum')->delete('/users/{id}', [UserController::class, 'destroy']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::apiResource('products', ProductController::class);

////Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'store']);
Route::post('/orders', [OrderController::class, 'store']);

//posts
//Route::middleware('auth:sanctum')->post('/posts', [PostsController::class, 'store']);
Route::post('/posts', [PostsController::class, 'store']);

<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardsController;
use App\Models\User;


Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('categories.products', CategoryProductController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('delivery-methods', DeliveryMethodController::class);
    Route::apiResource('payment-types', PaymentTypeController::class);
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('favorites', FavoriteController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('user-address', UserAddressController::class);
    Route::apiResource('user-payment-cards', UserPaymentCardsController::class);
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductPhotoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardsController;
use App\Http\Controllers\UserSettingController;

Route::prefix('auth')->group(function () {  // authenticator
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('change-password', [AuthController::class, 'changePassword'])->middleware('auth:sanctum');
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('v1')->group(function () {  // Open to everyone
    Route::get('products/{product}/related', [ProductController::class, 'related']);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('categories.products', CategoryProductController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('delivery-methods', DeliveryMethodController::class);
    Route::apiResource('payment-types', PaymentTypeController::class);
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () { // Only for registered users
    Route::get('user', [AuthController::class, 'user']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::post('roles/assign', [RoleController::class, 'assign']);
    Route::apiResource('permissions', PermissionController::class);
    Route::post('permissions/assign', [PermissionController::class, 'assign']);

    Route::apiResource('photos', PhotoController::class);
    Route::apiResource('favorites', FavoriteController::class);
    Route::apiResource('discounts', DiscountController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('status', StatusController::class);
    Route::apiResource('users.photos', UserPhotoController::class);
    Route::apiResource('products.photos', ProductPhotoController::class);
    Route::apiResource('status.orders', StatusOrderController::class);
    Route::apiResource('user-address', UserAddressController::class);
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('products.reviews', ProductReviewController::class);
    Route::apiResource('settings', SettingController::class);
    Route::apiResource('user-settings', UserSettingController::class);
    Route::apiResource('payment-card-types', PaymentCardTypeController::class);
    Route::apiResource('user-payment-cards', UserPaymentCardsController::class);
});

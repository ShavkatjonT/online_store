<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;


Route::prefix('stats')->middleware('auth:sanctum')->group(function () {  // For admin only
    Route::get('orders-count', [StatsController::class, 'ordersCount']);
    Route::get('orders-sales-sum', [StatsController::class, 'ordersSalesSum']);
    Route::get('delivery-methods-ratio', [StatsController::class, 'deliveryMethodsRatio']);
    Route::get('orders-count-by-days', [StatsController::class, 'ordersCountByDays']);
});

Route::prefix('')->middleware('auth:sanctum')->group(function () {  // For admin only
    Route::apiResource('orders', OrderController::class);
});

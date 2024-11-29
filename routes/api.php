<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderDueController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlacingOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/product', ProductController::class);
Route::apiResource('/customer', CustomerController::class);
Route::apiResource('/order', OrderController::class);
Route::apiResource('/order_detail', OrderDetailController::class);
Route::apiResource('/order_due', OrderDueController::class);
Route::apiResource('/invoice', InvoiceController::class);
Route::apiResource('/payment', PaymentController::class);
Route::apiResource('/expense', ExpenseController::class);
Route::apiResource('/withdraw', WithdrawController::class);



Route::apiResource('/placing_order', PlacingOrderController::class);















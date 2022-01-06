<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bungadavi\Product\ProductController;
use App\Http\Controllers\Bungadavi\Transaction\OrderController;
use App\Http\Controllers\Courier\CourierTaskController;

Route::group([
    'prefix' => 'affiliate',
    'as' => 'affiliate.',
    'middleware' =>['auth', 'role:affiliate']
], function () {

    Route::get('dashboard', function () {
        return view('affiliate.dashboard');
    })->name('dashboard');

    // PRODUCT CONTROL
    Route::get('products', [ProductController::class, "index"])->name('products');
    Route::resource('transaction', OrderController::class)->names('orders');
    Route::post('transaction/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.update_status');

    Route::resource('couriertask', CourierTaskController::class)->names('couriertask');
});

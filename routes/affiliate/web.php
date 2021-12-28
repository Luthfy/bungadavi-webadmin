<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bungadavi\Product\ProductController;

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
});

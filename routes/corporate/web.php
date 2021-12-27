<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bungadavi\Product\ProductController;

Route::group([
    'prefix' => 'corporate',
    'as' => 'corporate.',
    'middleware' =>['web', 'role:corporate']
], function () {

    Route::get('dashboard', function () {
        return view('corporate.dashboard');
    })->name('dashboard');

    // PRODUCT CONTROL
    Route::get('products', [ProductController::class, "index"])->name('products');

});

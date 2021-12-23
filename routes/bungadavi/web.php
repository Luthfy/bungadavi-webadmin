<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bungadavi\DashboardController;

Route::group([
    'prefix' => 'bungadavi',
    'as' => 'bungadavi.',
    'namespace' => 'App\Http\Controllers\Bungadavi',
    'middleware' =>['web', 'role:bungadavi']
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

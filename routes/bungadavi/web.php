<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'bungadavi', 
    'as' => 'bungadavi.', 
    'middleware' =>['web', 'role:bungadavi']
], function () {

    Route::get('dashboard', function () {
        return 'testing';
    })->name('dashboard');
    
});
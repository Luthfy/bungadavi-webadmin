<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'affiliate', 
    'as' => 'affiliate.', 
    'middleware' =>['web', 'role:affiliate']
], function () {

    Route::get('dashboard', function () {
        return 'testing';
    })->name('dashboard');
    
});
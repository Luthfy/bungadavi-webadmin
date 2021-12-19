<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'corporate', 
    'as' => 'corporate.', 
    'middleware' =>['web', 'role:corporate']
], function () {

    Route::get('dashboard', function () {
        return 'corporate';
    })->name('dashboard');
    
});
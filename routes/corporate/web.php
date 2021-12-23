<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'corporate',
    'as' => 'corporate.',
    'middleware' =>['web', 'role:corporate']
], function () {

    Route::get('dashboard', function () {
        return view('corporate.dashboard');
    })->name('dashboard');

});

<?php

use App\Http\Controllers\Bungadavi\Location\CityController;
use App\Http\Controllers\Bungadavi\Location\CountryController;
use App\Http\Controllers\Bungadavi\Location\DistrictController;
use App\Http\Controllers\Bungadavi\Location\ProvinceController;
use App\Http\Controllers\Bungadavi\Location\VillageController;
use App\Http\Controllers\Bungadavi\Location\ZipCodeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'bungadavi',
    'as' => 'bungadavi.',
    'middleware' =>['web', 'role:bungadavi']
], function () {
    // ajax
    Route::get('location/ajax/country', [CountryController::class, 'getCountries'])->name('country.ajax.list');
    Route::get('location/ajax/province', [ProvinceController::class, 'getProvinces'])->name('province.ajax.list');
    Route::get('location/ajax/city', [CityController::class, 'getCities'])->name('city.ajax.list');
    Route::get('location/ajax/district', [DistrictController::class, 'getDistricts'])->name('district.ajax.list');
    Route::get('location/ajax/village', [VillageController::class, 'getVillages'])->name('village.ajax.list');
    Route::get('location/ajax/zipcode', [ZipCodeController::class, 'getZipCodes'])->name('zipcode.ajax.list');

    Route::resource('location/city', CityController::class)->names('city');
    Route::resource('location/country', CountryController::class)->names('country');
    Route::resource('location/province', ProvinceController::class)->names('province');
    Route::resource('location/district', DistrictController::class)->names('district');
    Route::resource('location/village', VillageController::class)->names('village');
    Route::resource('location/zipcode', ZipCodeController::class)->names('zipcode');

});

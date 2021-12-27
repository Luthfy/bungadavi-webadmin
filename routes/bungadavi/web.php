<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courier\CourierController;
use App\Http\Controllers\Bungadavi\DashboardController;
use App\Http\Controllers\Bungadavi\Stock\ShopController;
use App\Http\Controllers\Bungadavi\Stock\SplitController;
use App\Http\Controllers\Bungadavi\Stock\StockController;
use App\Http\Controllers\Bungadavi\Stock\OpnameController;
use App\Http\Controllers\Bungadavi\Location\CityController;
use App\Http\Controllers\Bungadavi\Product\ProductController;
use App\Http\Controllers\Bungadavi\Location\CountryController;
use App\Http\Controllers\Bungadavi\Location\VillageController;
use App\Http\Controllers\Bungadavi\Location\ZipCodeController;
use App\Http\Controllers\Bungadavi\BasicSetting\UnitController;
use App\Http\Controllers\Bungadavi\Location\DistrictController;
use App\Http\Controllers\Bungadavi\Location\ProvinceController;
use App\Http\Controllers\Bungadavi\BasicSetting\ColorController;
use App\Http\Controllers\Bungadavi\BasicSetting\OurBankController;
use App\Http\Controllers\Bungadavi\BasicSetting\CategoryController;
use App\Http\Controllers\Bungadavi\BasicSetting\CurrencyController;
use App\Http\Controllers\Bungadavi\BasicSetting\DiscountController;
use App\Http\Controllers\Bungadavi\BasicSetting\MidtransController;
use App\Http\Controllers\Bungadavi\BasicSetting\TimeSlotController;
use App\Http\Controllers\Bungadavi\BasicSetting\PromotionController;
use App\Http\Controllers\Bungadavi\BasicSetting\PaymentTypeController;
use App\Http\Controllers\Bungadavi\BasicSetting\SubCategoryController;
use App\Http\Controllers\Bungadavi\BasicSetting\CurrencyRateController;
use App\Http\Controllers\Bungadavi\BasicSetting\SlidingBannerController;
use App\Http\Controllers\Bungadavi\BasicSetting\DeliveryRemarkController;
use App\Http\Controllers\Bungadavi\BasicSetting\CardMessageCategoryController;
use App\Http\Controllers\Bungadavi\BasicSetting\CardMessageSubCategoryController;
use App\Http\Controllers\Bungadavi\Client\CorporateController;
use App\Http\Controllers\Bungadavi\Client\FloristController;
use App\Http\Controllers\Bungadavi\Client\PersonalController;

Route::group([
    'prefix' => 'bungadavi',
    'as' => 'bungadavi.',
    'middleware' =>['auth', 'role:bungadavi']
], function () {

    Route::redirect('/', 'bungadavi/dashboard');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CLIENT
    Route::resource('personal', PersonalController::class)->names('personal');
    Route::resource('corporate', CorporateController::class)->names('corporate');
    Route::resource('florist', FloristController::class)->names('florist');

    // LOCATION
    Route::prefix('location')->group(function () {
        // ajax
        Route::get('ajax/country', [CountryController::class, 'getCountries'])->name('country.ajax.list');
        Route::get('ajax/province', [ProvinceController::class, 'getProvinces'])->name('province.ajax.list');
        Route::get('ajax/city', [CityController::class, 'getCities'])->name('city.ajax.list');
        Route::get('ajax/district', [DistrictController::class, 'getDistricts'])->name('district.ajax.list');
        Route::get('ajax/village', [VillageController::class, 'getVillages'])->name('village.ajax.list');
        Route::get('ajax/zipcode', [ZipCodeController::class, 'getZipCodes'])->name('zipcode.ajax.list');
        // web
        Route::resource('city', CityController::class)->names('city');
        Route::resource('country', CountryController::class)->names('country');
        Route::resource('province', ProvinceController::class)->names('province');
        Route::resource('district', DistrictController::class)->names('district');
        Route::resource('village', VillageController::class)->names('village');
        Route::resource('zipcode', ZipCodeController::class)->names('zipcode');
    });

    // BASIC SETTING
    Route::prefix('basicsetting')->group(function () {
        // ajax
        Route::get('category/ajax', [CategoryController::class, 'getCategories'])->name('categories.ajax.list');
        Route::get('subcategory/ajax', [SubCategoryController::class, 'getSubCategories'])->name('subcategories.ajax.list');
        // web
        Route::resource('unit', UnitController::class)->names('unit');
        Route::resource('currency', CurrencyController::class)->names('currency');
        Route::resource('cardmessagecategory', CardMessageCategoryController::class)->names('cardmessagecategory');
        Route::resource('cardmessagesubcategory', CardMessageSubCategoryController::class)->names('cardmessagesubcategory');
        Route::resource('category', CategoryController::class)->names('category');
        Route::resource('subcategory', SubCategoryController::class)->names('subcategory');
        Route::resource('color', ColorController::class)->names('color');
        Route::resource('slidingbanner', SlidingBannerController::class)->names('slidingbanner');
        Route::resource('currencyrate', CurrencyRateController::class)->names('currencyrate');
        Route::resource('deliveryremark', DeliveryRemarkController::class)->names('deliveryremark');
        Route::resource('ourbank', OurBankController::class)->names('ourbank');
        Route::resource('promotion', PromotionController::class)->names('promotion');
        Route::resource('timeslot', TimeSlotController::class)->names('timeslot');
        Route::resource('discount', DiscountController::class)->names('discount');
        Route::resource('payment_type', PaymentTypeController::class)->names('paymenttype');
        Route::resource('midtrans', MidtransController::class)->names('midtrans');
    });

    // PRODUCT CONTROL
    Route::resource('products', ProductController::class)->names('products');

    // STOCK CONTROL
    Route::resource('stocks', StockController::class)->names('stocks');
    Route::resource('opnames', OpnameController::class)->names('opnames');
    Route::resource('shops', ShopController::class)->names('shops');
    Route::resource('splits', SplitController::class)->names('splits');

    // Courier
    Route::resource('courier', CourierController::class)->names('couriers');

    // Route::get('create_courier', [CourierController::class, 'form_create']);
    // Route::get('courier_list',[CourierController::class, 'index']);
    // Route::get('courier_list_ajax',[CourierController::class, 'dataAjaxCourier']);
    // Route::post('save_courier',[CourierController::class, 'save_courier']);
    // Route::get('courier_detail/{uuid}', [CourierController::class, 'detail_courier']);
    // Route::put('update_courier', [CourierController::class, 'update_courier']);
    // Route::get('courier_task', [CourierController::class, 'courier_task']);
    // Route::get('courier_task_detail/{uuid}', [CourierController::class, 'courier_task_detail']);
    // Route::put('update_courier_task', [CourierController::class, 'update_courier_task']);

});

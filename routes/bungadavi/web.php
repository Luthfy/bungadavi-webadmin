<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courier\CourierController;
use App\Http\Controllers\Bungadavi\DashboardController;
use App\Http\Controllers\Bungadavi\Stock\ShopController;
use App\Http\Controllers\Bungadavi\Stock\SplitController;
use App\Http\Controllers\Bungadavi\Stock\StockController;
use App\Http\Controllers\Bungadavi\Stock\OpnameController;
use App\Http\Controllers\Bungadavi\Location\CityController;
use App\Http\Controllers\Bungadavi\Client\FloristController;
use App\Http\Controllers\Bungadavi\Client\PersonalController;
use App\Http\Controllers\Bungadavi\Product\ProductController;
use App\Http\Controllers\Bungadavi\Client\AffiliateController;
use App\Http\Controllers\Bungadavi\Client\CorporateController;
use App\Http\Controllers\Bungadavi\Location\CountryController;
use App\Http\Controllers\Bungadavi\Location\VillageController;
use App\Http\Controllers\Bungadavi\Location\ZipCodeController;
use App\Http\Controllers\Bungadavi\BasicSetting\UnitController;
use App\Http\Controllers\Bungadavi\Location\DistrictController;
use App\Http\Controllers\Bungadavi\Location\ProvinceController;
use App\Http\Controllers\Bungadavi\Transaction\OrderController;
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
use App\Http\Controllers\Bungadavi\Client\FloristAdminController;
use App\Http\Controllers\Bungadavi\Client\FloristRecipientController;
use App\Http\Controllers\Bungadavi\Client\PersonalRecipientController;
use App\Http\Controllers\Bungadavi\User\GroupController;
use App\Http\Controllers\Bungadavi\User\UserController;
use App\Http\Controllers\Courier\CourierTaskController;
use App\Http\Controllers\Log\ActivityLogController;

Route::group([
    'prefix' => 'bungadavi',
    'as' => 'bungadavi.',
    'middleware' =>['auth', 'role:bungadavi']
], function () {

    Route::redirect('/', 'bungadavi/dashboard');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CLIENT
    Route::get('personal/ajax-list', [PersonalController::class, 'list'])->name('personals.ajax.list');
    Route::get('personalrecipient/ajax-list/{user}', [PersonalRecipientController::class, 'list'])->name('personalsrecipient.ajax.list');

    Route::get('florist/ajax-list', [AffiliateController::class, 'list'])->name('affiliate.ajax.list');
    Route::get('floristrecipient/ajax-list/{user}', [AffiliateController::class, 'listRecipient'])->name('affiliaterecipient.ajax.list');
    Route::get('florist/pic/{customerId}', [UserController::class, 'picFlorist'])->name('florist.piclist.ajax');

    Route::get('corporate/ajax-list', [CorporateController::class, 'list'])->name('corporate.ajax.list');
    Route::get('corporate/pic/{customerId}', [UserController::class, 'picCorporate'])->name('corporate.piclist.ajax');

    Route::get('products/ajax-list', [ProductController::class, 'list'])->name('products.ajax.list');
    Route::get('cardmessagecategory/ajax-list', [CardMessageCategoryController::class, 'list'])->name('cardmessagecategory.ajax.list');
    Route::get('cardmessagesubcategory/ajax-list/{cardmessagecategory}', [CardMessageSubCategoryController::class, 'list'])->name('cardmessagesubcategory.ajax.list');
    Route::get('timeslots/ajax-list/{dates}', [TimeSlotController::class, 'list'])->name('timeslot.ajax.list');

    Route::get('courier/ajax-list/{florist_uuid?}', [CourierController::class, 'list'])->name('courier.ajax.list');
    Route::post('couriertask/assigned/{scheduleId?}', [CourierTaskController::class, 'assignToCourier'])->name('couriertask.assign');

    Route::resource('personal', PersonalController::class)->names('personal');
    Route::resource('personalrecipient', PersonalRecipientController::class)->names('personalrecipient');
    Route::resource('corporate', CorporateController::class)->names('corporate');
    Route::resource('florist', FloristController::class)->names('florist');
    Route::resource('floristrecipient', FloristRecipientController::class)->names('floristrecipient');
    Route::resource('floristadmin', FloristAdminController::class)->names('floristadmin');

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
        Route::get('deliveryremark/ajax', [DeliveryRemarkController::class, 'list'])->name('deliveryremark.ajax.list');
        Route::get('stocks/ajax', [StockController::class, 'getStocks'])->name('stocks.ajax.list');

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
    Route::post('products/uploads', [ProductController::class, 'uploads'])->name('products.uploads');
    Route::resource('products', ProductController::class)->names('products');

    // STOCK CONTROL
    Route::resource('stocks', StockController::class)->names('stocks');
    Route::resource('opnames', OpnameController::class)->names('opnames');
    Route::resource('shops', ShopController::class)->names('shops');
    Route::resource('splits', SplitController::class)->names('splits');

    // TRANSACTION ORDER
    Route::post('transaction/{id}', [OrderController::class, 'assignFlorist'])->name('orders.florist');
    Route::post('transaction/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.update_status');

    Route::resource('transaction', OrderController::class)->names('orders');
    Route::get('realtime_order', [OrderController::class, 'realTimeOrder'])->name('orders.realtimeorder');

    // Courier
    Route::resource('courier', CourierController::class)->names('courier');
    Route::resource('couriertask', CourierTaskController::class)->names('couriertask');

    Route::prefix('log')->group(function () {
        Route::get('activity-log', [ActivityLogController::class, 'index'])->name('log.activity');
    });

    Route::resource('users', UserController::class)->names('users');
    Route::resource('groups', GroupController::class)->names('groups');
});

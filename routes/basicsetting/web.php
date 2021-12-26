<?php

use App\Http\Controllers\Bungadavi\BasicSetting\CardMessageCategoryController;
use App\Http\Controllers\Bungadavi\BasicSetting\CardMessageSubCategoryController;
use App\Http\Controllers\Bungadavi\BasicSetting\CategoryController;
use App\Http\Controllers\Bungadavi\BasicSetting\ColorController;
use App\Http\Controllers\Bungadavi\BasicSetting\CurrencyController;
use App\Http\Controllers\Bungadavi\BasicSetting\CurrencyRateController;
use App\Http\Controllers\Bungadavi\BasicSetting\DeliveryRemarkController;
use App\Http\Controllers\Bungadavi\BasicSetting\DiscountController;
use App\Http\Controllers\Bungadavi\BasicSetting\OurBankController;
use App\Http\Controllers\Bungadavi\BasicSetting\PromotionController;
use App\Http\Controllers\Bungadavi\BasicSetting\SlidingBannerController;
use App\Http\Controllers\Bungadavi\BasicSetting\SubCategoryController;
use App\Http\Controllers\Bungadavi\BasicSetting\TimeSlotController;
use App\Http\Controllers\Bungadavi\BasicSetting\UnitController;
use App\Http\Controllers\Bungadavi\BasicSetting\MidtransController;
use App\Http\Controllers\Bungadavi\BasicSetting\PaymentTypeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'bungadavi',
    'as' => 'bungadavi.',
    'middleware' =>['web', 'role:bungadavi']
], function () {
    // ajax
    Route::get('basicsetting/category/ajax', [CategoryController::class, 'getCategories'])->name('categories.ajax.list');
    Route::get('basicsetting/subcategory/ajax', [SubCategoryController::class, 'getSubCategories'])->name('subcategories.ajax.list');

    // web
    Route::resource('basicsetting/unit', UnitController::class)->names('unit');
    Route::resource('basicsetting/currency', CurrencyController::class)->names('currency');
    Route::resource('basicsetting/cardmessagecategory', CardMessageCategoryController::class)->names('cardmessagecategory');
    Route::resource('basicsetting/cardmessagesubcategory', CardMessageSubCategoryController::class)->names('cardmessagesubcategory');
    Route::resource('basicsetting/category', CategoryController::class)->names('category');
    Route::resource('basicsetting/subcategory', SubCategoryController::class)->names('subcategory');
    Route::resource('basicsetting/color', ColorController::class)->names('color');
    Route::resource('basicsetting/slidingbanner', SlidingBannerController::class)->names('slidingbanner');
    Route::resource('basicsetting/currencyrate', CurrencyRateController::class)->names('currencyrate');
    Route::resource('basicsetting/deliveryremark', DeliveryRemarkController::class)->names('deliveryremark');
    Route::resource('basicsetting/ourbank', OurBankController::class)->names('ourbank');
    Route::resource('basicsetting/promotion', PromotionController::class)->names('promotion');
    Route::resource('basicsetting/timeslot', TimeSlotController::class)->names('timeslot');
    Route::resource('basicsetting/discount', DiscountController::class)->names('discount');
    Route::resource('basicsetting/payment_type', PaymentTypeController::class)->names('paymenttype');
    Route::resource('basicsetting/midtrans', MidtransController::class)->names('paymenttype');
});

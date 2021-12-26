<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('promo_uuid')->nullable();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('description')->nullable();
            $table->string('description_en')->nullable();
            $table->string('voucher_code')->nullable();
            $table->dateTime('voucher_start_date')->nullable();
            $table->dateTime('voucher_end_date')->nullable();
            $table->string('discount_type')->nullable();
            $table->integer('discount_value')->nullable();
            $table->integer('discount_max')->nullable();
            $table->integer('minbill')->nullable();
            $table->boolean('action_by_guest')->nullable();
            $table->integer('is_used')->nullable()->default(0);
            $table->integer('quota')->nullable();
            $table->string('payment_category')->nullable();
            $table->string('payment_type_id')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('tnc')->nullable();
            $table->string('tnc_en')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount');
    }
}

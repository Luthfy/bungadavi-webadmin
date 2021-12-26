<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('description_en')->nullable();
            $table->string('tnc')->nullable();
            $table->string('tnc_en')->nullable();
            $table->string('promotion_code')->nullable();
            $table->boolean('is_active')->nullable();
            $table->dateTime('promo_start_date')->nullable();
            $table->dateTime('promo_end_date')->nullable();
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
        Schema::dropIfExists('promotion');
    }
}

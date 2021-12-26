<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidingBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliding_banner', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable();
            $table->string('type')->nullable();
            $table->dateTime('banner_start_date')->nullable();
            $table->dateTime('banner_end_date')->nullable();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('description')->nullable();
            $table->string('description_en')->nullable();
            $table->string('is_active')->nullable();
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
        Schema::dropIfExists('sliding_banner');
    }
}

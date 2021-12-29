<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_rate', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name_rates');
            $table->foreignUuid('village_origin_uuid')->nullable()->index();
            $table->foreignUuid('village_destination_uuid')->nullable()->index();
            $table->string('type_rates')->default('contract')->comment('Jenis Rates seperti Untuk Kontrak atau Freelance atau Partner');
            $table->bigInteger('price_rates')->default('0');
            $table->string('unit_rates')->comment('Seperti 1x Pengantaran atau Per KM');
            $table->string('currency_type')->nullable()->default('Rp');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('delivery_rate');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidtranLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('midtrans_setting', function (Blueprint $table) {
            $table->id();
            $table->string('mode')->default('sandbox')->comment('sandbox or production');
            $table->string('url')->nullable();
            $table->string('header_raw')->nullable();
            $table->string('authorization_key')->nullable()->comment('build with basic base64 encryption');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('midtrans_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('token')->nullable();
            $table->string('id_order')->nullable();
            $table->string('redirect_url')->nullable();
            $table->text('data')->nullable();
            $table->foreignUuid('order_transactions_uuid')->nullable()->index();
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
        Schema::dropIfExists('midtran_logs');
    }
}

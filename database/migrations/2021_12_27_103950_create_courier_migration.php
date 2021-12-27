<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('unique_code_courier')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullname', 30);
            $table->string('mobile', 20);
            $table->char('gender', 1)->nullable();
            $table->date('DOB')->nullable();
            $table->string('marital_status', 20)->nullable();
            $table->integer('point')->default(0);
            $table->string('ktp')->nullable();
            $table->string('ktp_images')->nullable();
            $table->string('npwp')->nullable();
            $table->string('npwp_images')->nullable();
            $table->string('license_type')->nullable()->comment('SIM C, SIM A');
            $table->string('license_number')->nullable();
            $table->string('license_image')->nullable();
            $table->date('license_expired_date')->nullable();
            $table->string('address', 255)->nullable();
            $table->foreignId('country')->nullable()->index();
            $table->foreignId('province')->nullable()->index();
            $table->foreignId('city')->nullable()->index();
            $table->foreignId('district')->nullable()->index();
            $table->foreignId('village')->nullable()->index();
            $table->foreignId('zipcode')->nullable()->index();
            $table->date('join_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('contract_number')->nullable();
            $table->date('terminate_date')->nullable();
            $table->string('terminate_description')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_beneficiary_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('photo')->nullable();
            $table->string('fcm')->nullable();
            $table->string('token')->nullable();
            $table->boolean('is_active', 1)->default(1);
            $table->foreignUuid('florist_uuid')->nullable()->index();
            $table->foreignUuid('user_uuid')->nullable()->index();
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
        Schema::dropIfExists('couriers');
    }
}

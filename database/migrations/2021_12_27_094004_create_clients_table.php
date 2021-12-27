<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Customer Personal
        Schema::create('client_personal', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('fullname')->nullable();
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('gender', 1)->nullable();
            $table->date('birthday')->nullable();

            $table->bigInteger('store_credit')->nullable();
            $table->bigInteger('poin_customer')->default(0);

            $table->string('latitude', 200)->nullable();
            $table->string('longitude', 200)->nullable();
            $table->text('address')->nullable();
            $table->foreignId('country_id')->nullable()->index();
            $table->foreignId('province_id')->nullable()->index();
            $table->foreignId('city_id')->nullable()->index();
            $table->foreignId('district_id')->nullable()->index();
            $table->foreignId('village_id')->nullable()->index();
            $table->foreignId('zipcode_id')->nullable()->index();

            $table->string('is_subcriber', 1)->default('1');
            $table->string('refferal')->nullable();
            $table->string('sharelink')->nullable();

            $table->string('email', 200)->unique();
            $table->string('username')->unique();
            $table->string('password')->unique();
            $table->string('pass_access')->nullable();

            $table->string('is_active')->default(1);
            $table->string('fcm')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // Customer Personal Recipient
        Schema::create('client_personal_recipient', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('gender', 1)->nullable();
            $table->date('birthday')->nullable();

            $table->string('latitude', 200)->nullable();
            $table->string('longitude', 200)->nullable();
            $table->text('address')->nullable();
            $table->foreignId('country_id')->nullable()->index();
            $table->foreignId('province_id')->nullable()->index();
            $table->foreignId('city_id')->nullable()->index();
            $table->foreignId('district_id')->nullable()->index();
            $table->foreignId('village_id')->nullable()->index();
            $table->foreignId('zipcode_id')->nullable()->index();

            $table->foreignUuid('client_personal_uuid')->nullable()->index();
            $table->string('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_personal_uuid')->references('uuid')->on('client_personal')->onDelete('cascade');
        });

        // Customer Corporate
        Schema::create('client_corporate', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('fullname')->nullable();
            $table->string('owner')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('website', 200)->nullable();

            $table->string('legal_type')->nullable();
            $table->string('npwp')->nullable();
            $table->string('npwp_image')->nullable();

            $table->string('latitude', 200)->nullable();
            $table->string('longitude', 200)->nullable();
            $table->text('address')->nullable();
            $table->foreignId('country_id')->nullable()->index();
            $table->foreignId('province_id')->nullable()->index();
            $table->foreignId('city_id')->nullable()->index();
            $table->foreignId('district_id')->nullable()->index();
            $table->foreignId('village_id')->nullable()->index();
            $table->foreignId('zipcode_id')->nullable()->index();

            $table->string('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('client_corporate_recipient', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('fullname')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('gender', 1)->nullable();

            $table->string('latitude', 200)->nullable();
            $table->string('longitude', 200)->nullable();
            $table->string('info_address')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('country_id')->nullable()->index();
            $table->foreignId('province_id')->nullable()->index();
            $table->foreignId('city_id')->nullable()->index();
            $table->foreignId('district_id')->nullable()->index();
            $table->foreignId('village_id')->nullable()->index();
            $table->foreignId('zipcode_id')->nullable()->index();

            $table->foreignUuid('client_corporate_uuid')->nullable()->index();
            $table->string('is_active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_corporate_uuid')->references('uuid')->on('client_corporate')->onDelete('cascade');
        });

        Schema::create('client_corporate_admin', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('email', 200)->unique();
            $table->string('username')->unique();
            $table->string('password')->unique();
            $table->string('pass_access')->nullable();

            $table->string('is_active')->default(1);
            $table->string('fcm');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('client_florist', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('fullname')->nullable();
            $table->string('owner')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('website', 200)->nullable();

            $table->char('legal_type', 1)->nullable()->comment('0 => Non Bussiness Company and 1 => Bussiness Company');
            $table->string('npwp')->nullable();
            $table->string('npwp_image')->nullable();

            $table->string('latitude', 200)->nullable();
            $table->string('longitude', 200)->nullable();
            $table->text('address')->nullable();
            $table->foreignId('country_id')->nullable()->index();
            $table->foreignId('province_id')->nullable()->index();
            $table->foreignId('city_id')->nullable()->index();
            $table->foreignId('district_id')->nullable()->index();
            $table->foreignId('village_id')->nullable()->index();
            $table->foreignId('zipcode_id')->nullable()->index();

            $table->integer('point')->default(0);
            $table->string('is_affiliate')->default(1);
            $table->string('is_special_feature_active')->default(1);

            $table->boolean('is_active')->default(1);
            $table->foreignUuid('user_uuid')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('client_florist_bank', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_beneficiary')->nullable();
            $table->string('bank_branch')->nullable();
            $table->foreignUuid('client_florist_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('client_florist_recipient', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('client_florist_admin', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->foreignUuid('client_florist_uuid')->nullable()->index();
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
        Schema::dropIfExists('clients');
    }
}

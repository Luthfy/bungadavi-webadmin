<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code_product')->unique()->index();
            $table->string('name_product');
            $table->string('short_description_product')->nullable();
            $table->string('short_description_en_product')->nullable();
            $table->string('description_product')->nullable();
            $table->string('description_en_product')->nullable();
            $table->foreignId('currency_uuid')->nullable();
            $table->bigInteger('cost_product')->nullable();
            $table->bigInteger('florist_cost_product')->nullable();
            $table->bigInteger('selling_price_product')->nullable();
            $table->bigInteger('selling_florist_price_product')->nullable();
            $table->string('status_product', 1)->nullable()->comment('0 => REGULER, 1 => NEW, 2 => MOSTWANTED');
            $table->integer('mostwanted_product')->default(0);
            $table->integer('popularity_product')->default(0);
            $table->integer('seen_product')->default(0);
            $table->string('image_main_product')->nullable();
            $table->string('images_product')->nullable();
            $table->string('as_addon_product')->nullable();
            $table->string('minimum_order_product')->nullable()->default(0);
            $table->string('printcmmode_product')->nullable();
            $table->foreignUuid('florist_uuid')->nullable()->index();
            $table->foreignUuid('user_uuid')->nullable()->index();
            $table->boolean('is_active')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_material', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('stocks_uuid')->nullable()->index();
            $table->foreignUuid('products_uuid')->nullable()->index();
            $table->integer('qty_used_products_material')->default(0);
            $table->boolean('is_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_color', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('color_id')->nullable()->index();
            $table->foreignUuid('products_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_size', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('size')->nullable()->index();
            $table->foreignUuid('products_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_category', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('category_id')->nullable()->index();
            $table->foreignUuid('products_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_subcategory', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('subcategory_id')->nullable()->index();
            $table->foreignUuid('products_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_city', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('city_id')->nullable()->index();
            $table->foreignUuid('products_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_reference', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('products_reference_uuid')->index();
            $table->foreignUuid('products_foreign_uuid')->nullable()->index();
            $table->foreignId('color_id')->nullable()->index();
            $table->string('size_product_reference')->nullable()->index();
            $table->boolean('is_active')->nullable();
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
        // Schema::dropIfExists('products_migration');
    }
}

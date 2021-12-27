<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code_stock')->nullable();
            $table->string('name_stock');
            $table->string('type_stock', 1)->comment('0 => Komponen, 1 => Etc, 2 => Product Split');
            $table->integer('qty_stock')->default(0);
            $table->string('image_stock')->nullable();
            $table->boolean('is_active')->default(1);
            $table->foreignId('unit_id')->nullable()->index();
            $table->foreignUuid('user_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('stocks_opname', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->integer('qty_stock_opname')->default(0);
            $table->string('notes_stock_opname')->nullable();
            $table->foreignUuid('stocks_uuid')->nullable()->index();
            $table->foreignUuid('user_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('stocks_shop', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->bigInteger('total_price_stock_shop')->default(0);
            $table->integer('qty_stock_shop')->default(0);
            $table->integer('reject_stock_shop')->default(0);
            $table->string('notes_stock_shop')->nullable();
            $table->foreignUuid('stocks_uuid')->nullable()->index();
            $table->foreignUuid('user_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('stocks_split', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->integer('qty_stock_split')->default(1)->unsigned();
            $table->text('notes_stock_split')->nullable();
            $table->foreignId('unit_id')->nullable()->index();
            $table->foreignUuid('stock_original_uuid')->nullable()->index();
            $table->foreignUuid('stock_fraction_uuid')->nullable()->index();
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
        Schema::dropIfExists('stocks_split');
        Schema::dropIfExists('stocks_shop');
        Schema::dropIfExists('stocks_opname');
        Schema::dropIfExists('stocks');
    }

}

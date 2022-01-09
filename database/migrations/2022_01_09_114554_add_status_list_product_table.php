<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusListProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_product_order_transactions', function (Blueprint $table) {
            $table->string('status_progress_product')->default('on process')->comment('done, undone, on process');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_product_order_transactions', function (Blueprint $table) {
            $table->dropColumn('status_progress_product');
        });
    }
}

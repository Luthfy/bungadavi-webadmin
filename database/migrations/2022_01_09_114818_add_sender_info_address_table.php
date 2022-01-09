<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSenderInfoAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sender_receiver_order_transactions', function (Blueprint $table) {
            $table->text('receiver_address_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sender_receiver_order_transactions', function (Blueprint $table) {
            $table->dropColumn('receiver_address_info');
        });
    }
}

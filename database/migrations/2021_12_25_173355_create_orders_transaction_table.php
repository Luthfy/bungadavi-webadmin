<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code_order_transaction');
            $table->string('type_order_transaction')->nullable()->comment('webcommerce, androidcommerce, ioscommerce, backoffice_bungadavi');
            $table->bigInteger('total_order_transaction')->default(0)->comment('total from all product order');
            $table->bigInteger('shipping_price_order_transaction')->default(0)->comment('combine delivery charge and timeslot price');
            $table->string('status_order_transaction')->nullable();
            $table->boolean('is_guest')->default(false);
            $table->string('code_currency')->default('IDR')->comment('default is Indonesian Rupiah');
            $table->bigInteger('rates_currency')->default(1)->comment('if code currency is IDR it will be enter 1');
            $table->string('card_message_category')->nullable();
            $table->string('card_message_subcategory')->nullable();
            $table->text('card_message_message')->nullable();
            $table->foreignUuid('florist_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = "MyIsam";
        });

        Schema::create('sender_receiver_order_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('order_transactions_uuid')->nullable()->index();
            $table->string('client_type')->comment('personal, corporate, and affiliate');
            $table->foreignUuid('client_uuid')->nullable()->index()->comment('uuid client sender');
            $table->boolean('is_secret')->default(false);
            $table->string('pic_name')->nullable();
            $table->string('sender_name');
            $table->string('po_referrence')->nullable();
            $table->string('sender_phone_number');
            $table->text('sender_address');
            $table->string('sender_country');
            $table->string('sender_province');
            $table->string('sender_city');
            $table->string('sender_district');
            $table->string('sender_village');
            $table->string('sender_zipcode');
            $table->string('sender_latitude')->nullable();
            $table->string('sender_longitude')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_phone_number');
            $table->text('receiver_address');
            $table->string('receiver_country');
            $table->string('receiver_province');
            $table->string('receiver_city');
            $table->string('receiver_district');
            $table->string('receiver_village');
            $table->string('receiver_zipcode');
            $table->string('receiver_latitude')->nullable();
            $table->string('receiver_longitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = "MyIsam";
        });

        Schema::create('list_product_order_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('product_uuid')->nullable()->index();
            $table->foreignUuid('order_transactions_uuid')->nullable()->index();
            $table->string('code_product');
            $table->string('name_product');
            $table->integer('qty_product');
            $table->bigInteger('price_product');
            $table->string('from_message_product')->nullable();
            $table->string('to_message_product')->nullable();
            $table->string('city_product')->nullable();
            $table->text('remarks_product')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = "MyIsam";
        });

        Schema::create('custom_product_order_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('list_product_uuid')->nullable()->index();
            $table->foreignUuid('products_material_uuid')->nullable()->index();
            $table->string('name_stock')->nullable();
            $table->integer('qty_stock')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = "MyIsam";
        });

        Schema::create('delivery_schedule_order', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('order_transactions_uuid')->nullable()->index();
            $table->foreignUuid('sender_receiver_uuid')->nullable()->index();
            $table->date('delivery_date')->nullable();
            $table->bigInteger('delivery_charge')->default(0);
            $table->string('time_slot_name')->nullable();
            $table->bigInteger('time_slot_charge')->default(0);
            $table->string('time_slot_id',255);
            $table->string('delivery_remarks',255)->nullable();
            $table->string('internal_notes',255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('delivery_assign_order', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('order_transactions_uuid')->nullable()->index();
            $table->foreignUuid('delivery_schedule_uuid')->nullable()->index();
            $table->foreignUuid('user_uuid')->nullable()->index();
            $table->foreignUuid('courier_uuid')->nullable()->index();
            $table->string('delivery_number_assignment')->nullable();
            $table->string('status_assignment')->comment('assigned, has been pickup, on delivery, has been received');
            $table->string('notes_assigment')->nullable();
            $table->boolean('browse_image')->default(false);
            $table->string('image_pickup')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('delivery_receipt_order', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('order_transactions_uuid')->nullable()->index();
            $table->foreignUuid('delivery_schedule_uuid')->nullable()->index();
            $table->foreignUuid('sender_receiver_uuid')->nullable()->index();
            $table->foreignUuid('delivery_assign_uuid')->nullable()->index();
            $table->foreignUuid('user_uuid')->nullable()->index();
            $table->foreignUuid('courier_uuid')->nullable()->index();
            $table->string('photo_delivery_receipt')->nullable();
            $table->string('recipient_receipt')->nullable();
            $table->string('status_receipt')->nullable()->comment('1 => received by customer, 2 => accept by courier');
            $table->text('notes_receipt')->nullable();
            $table->string('fee_receipt')->nullable();
            $table->string('reward_receipt')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('payment_order_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid('order_transactions_uuid')->nullable()->index();
            $table->foreignUuid('sender_receiver_uuid')->nullable()->index();
            $table->string('status_payment_order')->nullable()->comment('unpaid, paid, cancel, reject');
            $table->string('proof_of_payment_order')->nullable();
            $table->string('data_payment_order')->nullable();
            $table->foreignUuid('payment_type_uuid')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('payment_type', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('payment_type', 100)->comment('Manual Transfer, VA BCA, MIDTRANS');
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
        Schema::dropIfExists('orders_transaction');
    }
}

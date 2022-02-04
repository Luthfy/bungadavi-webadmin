<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientAffiliateUuidToClientCorporateRecipientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_corporate_recipient', function (Blueprint $table) {
            $table->foreignUuid('client_affiliate_uuid')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_corporate_recipient', function (Blueprint $table) {
            $table->dropForeign('client_corporate_recipient_client_affiliate_uuid_foreign');
            $table->dropColumn('client_affiliate_uuid');
        });
    }
}

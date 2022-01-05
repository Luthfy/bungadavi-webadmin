<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionHasMenuMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('position_has_menu', function (Blueprint $table) {
            $table->id();
            $table->uuid('position_id')->nullable()->index();
            $table->uuid('groups_uuid')->nullable()->index();
            $table->uuid('menu_uuid')->nullable()->index();
            $table->uuid('submenu_uuid')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_has_menu');
        Schema::dropIfExists('positions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name_group');
            $table->integer('is_priority')->default(0);
            $table->integer('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name_menu');
            $table->string('icon_menu')->nullable();
            $table->integer('submenu_menu')->default(0);
            $table->string('link_menu')->nullable();
            $table->string('guard_menu');
            $table->integer('is_priority');
            $table->integer('is_active')->default(1);
            $table->foreignUuid('groups_uuid')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('groups_uuid')->references('uuid')->on('groups')->onDelete('cascade');
        });

        Schema::create('submenus', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name_submenu');
            $table->string('icon_submenu')->nullable();
            $table->string('link_submenu')->nullable();
            $table->string('guard_submenu')->nullable();
            $table->integer('is_priority');
            $table->integer('is_active')->default(1);
            $table->foreignUuid('groups_uuid')->nullable();
            $table->foreignUuid('menu_uuid')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('groups_uuid')->references('uuid')->on('groups')->onDelete('cascade');
            $table->foreign('menu_uuid')->references('uuid')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}

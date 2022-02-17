<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_sub_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_menu_id')->constrained('page_menus')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('page_directory');
            $table->string('description')->comment('the description will be used for meta description too');
            $table->bigInteger('sorting_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_sub_menus');
    }
};

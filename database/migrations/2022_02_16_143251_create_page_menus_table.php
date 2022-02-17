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
        Schema::create('page_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('page_directory');
            $table->string('icon_class')->comment('apply mdi or font-awesome class');
            $table->string('module')->comment('like inventory or human resources divisions');
            $table->bigInteger('sorting_number')->comment('to help sorting item');
            $table->string('description')->comment('description will be used for meta description too');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_menus');
    }
};

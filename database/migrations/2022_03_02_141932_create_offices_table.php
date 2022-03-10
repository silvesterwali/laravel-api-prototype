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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('office_code')->unique();
            $table->string('office');
            $table->string('description');
            $table->double('over_time_pay', 8, 2);
            $table->smallInteger('different_time');
            $table->string('telephone')->nullable();
            $table->string('coce_code')->nullable();
            $table->time('on_duty_monday')->nullable();
            $table->time('off_duty_monday')->nullable();
            $table->time('on_duty_tuesday')->nullable();
            $table->time('off_duty_tuesday')->nullable();
            $table->time('on_duty_wednesday')->nullable();
            $table->time('off_duty_wednesday')->nullable();
            $table->time('on_duty_thursday')->nullable();
            $table->time('off_duty_thursday')->nullable();
            $table->time('on_duty_friday')->nullable();
            $table->time('off_duty_friday')->nullable();
            $table->time('on_duty_saturday')->nullable();
            $table->time('off_duty_saturday')->nullable();
            $table->time('on_duty_sunday')->nullable();
            $table->time('off_duty_sunday')->nullable();
            $table->time('on_shift_1')->nullable();
            $table->time('off_shift_1')->nullable();
            $table->time('on_shift_2')->nullable();
            $table->time('off_shift_2')->nullable();
            $table->time('on_shift_3')->nullable();
            $table->time('off_shift_3')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('offices');
    }
};

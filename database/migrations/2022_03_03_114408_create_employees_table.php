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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('code_company');
            $table->string('nik')
                ->nullable()
                ->comment('nomor induk karyawan');
            $table->string('fullname');
            $table->string('pin2')
                ->nullable();
            $table->string('address')
                ->nullable();
            $table->string('alternative_address')
                ->nullable();
            $table->smallInteger('gender')
                ->comment("0=female,1=male");
            $table->string('religion')
                ->nullable();
            $table->string("phone")
                ->nullable();
            $table->string('handphone')
                ->nullable();
            $table->string('email')
                ->nullable()
                ->comment('alternative of personal email');
            $table->string('place_of_birth')
                ->nullable();
            $table->date('date_of_birth')
                ->nullable();
            $table->string('blood_type')
                ->max(3)
                ->nullable();
            $table->string('marital_sts')
                ->nullable();
            $table->string('photo_character')
                ->nullable();
            $table->string('gate_of_belief')
                ->nullable();
            $table->foreignId('employee_education_id')
                ->constrained('employee_education')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('office_id')
                ->constrained('offices')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('employee_division_id')
                ->constrained('employee_divisions')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('employee_position_id')
                ->constrained('employee_positions')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreignId('employee_department_id')
                ->constrained('employee_departments')
                ->onUpdate('cascade')
                ->onDelete('set null')
                ->nullable();
            $table->smallInteger('overtime')
                ->default(0)
                ->comment('access for overtime work');
            $table->time('off_duty')
                ->nullable();
            $table->time('off_duty2')
                ->nullable();
            $table->string('identity')
                ->nullable();
            $table->string('identity_number')
                ->nullable()->comment('nomor kartu keluaga');
            $table->string('family_number')
                ->nullable();
            $table->date('joined_at');
            $table->date('expired_date')
                ->nullable();
            $table->date('start_at')->nullable();
            $table->string('status')
                ->nullable();
            $table->string('status_notes')
                ->nullable();
            $table->date('resign_at')
                ->nullable();
            $table->string('resign_notes')
                ->nullable();
            $table->string('path_photo')->nullable();
            $table->smallInteger('shift')
                ->default(0);
            $table->smallInteger('x_stat')
                ->default(1);
            $table->boolean('pic')
                ->default(false);
            $table->string('npwp')->nullable();
            $table->foreignId('user_insert_id')
                ->constrained('users')
                ->nullable()
                ->onDelete('set null');
            $table->foreignId('user_update_id')
                ->constrained('users')
                ->nullable()
                ->onDelete('set null');
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
        Schema::dropIfExists('employees');
    }
};

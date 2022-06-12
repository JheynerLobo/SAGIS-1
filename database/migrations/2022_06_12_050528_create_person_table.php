<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->integer('identification')->primary();
            $table->string('name');
            $table->string('surname');
            $table->bigInteger('cell_phone');
            $table->integer('phone')->nullable();
            $table->string('mail_personal');
            $table->date('date_birth');
            $table->integer('place_birth')->unique('lugar_nacimiento');
            $table->text('address_residence');
            $table->integer('info_working')->unique('info_laboral');
            $table->integer('info_academic')->unique('info_academica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person');
    }
}

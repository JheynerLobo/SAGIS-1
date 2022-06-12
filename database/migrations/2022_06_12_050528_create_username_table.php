<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsernameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('username', function (Blueprint $table) {
            $table->integer('id_username', true);
            $table->integer('identification')->unique('cedula');
            $table->string('password', 100);
            $table->string('mail_institutional');
            $table->integer('code');
            $table->text('photo_profile')->nullable();
            $table->boolean('usu_verified');
            $table->integer('role')->unique('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('username');
    }
}

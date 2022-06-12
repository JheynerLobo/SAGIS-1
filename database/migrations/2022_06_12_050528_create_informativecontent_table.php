<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformativecontentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informativecontent', function (Blueprint $table) {
            $table->integer('id_cont_infor', true);
            $table->string('name');
            $table->text('description');
            $table->date('date');
            $table->integer('type')->unique('tipo');
            $table->integer('username')->unique('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informativecontent');
    }
}

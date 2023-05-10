<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSituationsGraduatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situations_graduates', function (Blueprint $table) {
            $table->integer('anio_graduation');
            $table->integer('graduados');
            $table->integer('anio_actual');
            $table->integer('independientes'); 
            $table->integer('dependientes');
            $table->integer('desempleados');
            $table->double('trabajando');
            $table->primary(['anio_graduation','anio_actual']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('situations_graduates');
    }
}
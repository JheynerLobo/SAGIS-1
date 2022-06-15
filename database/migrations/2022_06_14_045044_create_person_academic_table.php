<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonAcademicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_academic', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('program_id');
            $table->year('year');

            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('program_id')->references('id')->on('programs')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_academics');
    }
}

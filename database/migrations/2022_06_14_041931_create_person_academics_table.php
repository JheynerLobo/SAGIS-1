<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_academics', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->smallInteger('year');

            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('program_id')->references('id')->on('programs')->cascadeOnUpdate()->nullOnDelete();
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

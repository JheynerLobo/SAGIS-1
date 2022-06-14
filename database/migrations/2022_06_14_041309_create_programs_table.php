<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->string('name');

            $table->timestamps();

         
            $table->foreign('faculty_id')->references('id')->on('faculties')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('level_id')->references('id')->on('academicLevels')->cascadeOnUpdate()->nullOnDelete();
         
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}

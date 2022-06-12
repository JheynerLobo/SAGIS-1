<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_information', function (Blueprint $table) {
            $table->integer('id_info_academic', true);
            $table->string('level_academic');
            $table->string('name_program_undergraduate');
            $table->date('year_graduation_undergraduate');
            $table->string('name_university');
            $table->boolean('studies_postgraduate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_information');
    }
}

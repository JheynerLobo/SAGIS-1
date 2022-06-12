<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicinfoStudypostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicinfo_studypost', function (Blueprint $table) {
            $table->integer('id_infoAc_studPost', true);
            $table->integer('id_info_academic')->unique('id_info_academica');
            $table->integer('id_study_post')->unique('id_estudio_post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academicinfo_studypost');
    }
}

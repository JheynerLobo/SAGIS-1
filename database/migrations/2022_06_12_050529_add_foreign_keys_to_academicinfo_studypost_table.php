<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAcademicinfoStudypostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academicinfo_studypost', function (Blueprint $table) {
            $table->foreign(['id_study_post'], 'estudioPost-infoAcadPost')->references(['id_study_post'])->on('study_postgraduate');
            $table->foreign(['id_info_academic'], 'info_academica-infoAcadPost')->references(['id_info_academic'])->on('academic_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academicinfo_studypost', function (Blueprint $table) {
            $table->dropForeign('estudioPost-infoAcadPost');
            $table->dropForeign('info_academica-infoAcadPost');
        });
    }
}

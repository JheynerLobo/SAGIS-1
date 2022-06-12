<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person', function (Blueprint $table) {
            $table->foreign(['info_academic'], 'info_academica-persona')->references(['id_info_academic'])->on('academic_information');
            $table->foreign(['place_birth'], 'lugar_nacimiento-persona')->references(['id'])->on('city');
            $table->foreign(['info_working'], 'info_laboral-persona')->references(['id_info_lab'])->on('working_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person', function (Blueprint $table) {
            $table->dropForeign('info_academica-persona');
            $table->dropForeign('lugar_nacimiento-persona');
            $table->dropForeign('info_laboral-persona');
        });
    }
}

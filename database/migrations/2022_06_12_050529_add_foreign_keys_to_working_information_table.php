<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWorkingInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('working_information', function (Blueprint $table) {
            $table->foreign(['info_company'], 'info_empresa-info_laboral')->references(['id_info_company'])->on('companyinformation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('working_information', function (Blueprint $table) {
            $table->dropForeign('info_empresa-info_laboral');
        });
    }
}

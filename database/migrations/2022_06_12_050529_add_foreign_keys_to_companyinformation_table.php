<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCompanyinformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companyinformation', function (Blueprint $table) {
            $table->foreign(['place'], 'ciudad-info_empresa')->references(['id'])->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companyinformation', function (Blueprint $table) {
            $table->dropForeign('ciudad-info_empresa');
        });
    }
}

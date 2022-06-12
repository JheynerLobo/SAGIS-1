<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyinformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyinformation', function (Blueprint $table) {
            $table->integer('id_info_company', true);
            $table->string('name');
            $table->string('position_occupied');
            $table->text('address');
            $table->string('type');
            $table->integer('place')->unique('lugar');
            $table->string('mail', 200);
            $table->bigInteger('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companyinformation');
    }
}

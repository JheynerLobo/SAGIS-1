<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_company', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedSmallInteger('company_id');
            $table->boolean('in_working')->nullable();

            $table->bigInteger('salary');

            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();

            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_companies');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_companies', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedBigInteger('person_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->timestamp('in_working');

            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->nullOnDelete();


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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->unsignedTinyInteger('document_type_id');
            $table->string('document');
            $table->string('phone');
            $table->string('address');
            $table->string('telephone')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('birthdate_place_id');
            $table->date('birthdate');

            $table->string('image_url')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('document_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('birthdate_place_id')->references('id')->on('cities')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}

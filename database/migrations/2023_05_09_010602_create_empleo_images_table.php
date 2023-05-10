<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleoImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleo_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleo_id');
            $table->string('asset_url');
            $table->string('asset')->nullable();
            $table->boolean('is_header')->default(false);

            $table->timestamps();

            $table->foreign('empleo_id')->references('id')->on('empleos')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleo_images');
    }
}

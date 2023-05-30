<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('graduate_id');
            $table->string('asset_url');
            $table->string('asset')->nullable();
            $table->boolean('is_header')->default(true);

            $table->timestamps();

            $table->foreign('graduate_id')->references('id')->on('graduates')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduate_images');
    }
}
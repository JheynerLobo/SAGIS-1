<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('experience_id');
            $table->string('asset_url');
            // $table->string('video')->nullable();
            $table->boolean('is_header')->default(false);

            $table->timestamps();

            $table->foreign('experience_id')->references('id')->on('experiences')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience_videos');
    }
}
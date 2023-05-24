<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('graduates_id');
            $table->string('asset_url');
            // $table->string('video')->nullable();
            $table->boolean('is_header')->default(false);

            $table->timestamps();

            $table->foreign('graduates_id')->references('id')->on('graduates')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduate_videos');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoInfocontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_infocont', function (Blueprint $table) {
            $table->integer('id_vid_cont', true);
            $table->integer('id_cont_infor')->unique('id_cont_infor');
            $table->integer('id_video')->unique('id_video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_infocont');
    }
}

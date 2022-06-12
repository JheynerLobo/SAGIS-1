<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVideoInfocontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_infocont', function (Blueprint $table) {
            $table->foreign(['id_vid_cont'], 'conte-videocont')->references(['id_cont_infor'])->on('informativecontent');
            $table->foreign(['id_video'], 'video-videocont')->references(['id_video'])->on('video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_infocont', function (Blueprint $table) {
            $table->dropForeign('conte-videocont');
            $table->dropForeign('video-videocont');
        });
    }
}

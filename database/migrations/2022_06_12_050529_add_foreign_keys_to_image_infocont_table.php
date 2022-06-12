<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToImageInfocontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_infocont', function (Blueprint $table) {
            $table->foreign(['id_img_cont'], 'conte-imagen_Con')->references(['id_cont_infor'])->on('informativecontent');
            $table->foreign(['id_img'], 'image-imagen_Con')->references(['id_img'])->on('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_infocont', function (Blueprint $table) {
            $table->dropForeign('conte-imagen_Con');
            $table->dropForeign('image-imagen_Con');
        });
    }
}

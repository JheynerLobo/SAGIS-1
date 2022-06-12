<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageInfocontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_infocont', function (Blueprint $table) {
            $table->integer('id_img_cont', true);
            $table->integer('id_cont_infor')->unique('id_cont_infor');
            $table->integer('id_img')->unique('id_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_infocont');
    }
}

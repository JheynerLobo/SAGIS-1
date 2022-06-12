<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInformativecontentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informativecontent', function (Blueprint $table) {
            $table->foreign(['type'], 'tipo-contenido')->references(['id'])->on('type');
            $table->foreign(['username'], 'usuario-contenido')->references(['id_username'])->on('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informativecontent', function (Blueprint $table) {
            $table->dropForeign('tipo-contenido');
            $table->dropForeign('usuario-contenido');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsernameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('username', function (Blueprint $table) {
            $table->foreign(['identification'], 'persona-usuario')->references(['identification'])->on('person');
            $table->foreign(['role'], 'usuario-rol')->references(['id_rol'])->on('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('username', function (Blueprint $table) {
            $table->dropForeign('persona-usuario');
            $table->dropForeign('usuario-rol');
        });
    }
}

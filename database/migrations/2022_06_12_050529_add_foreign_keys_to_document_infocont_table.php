<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentInfocontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_infocont', function (Blueprint $table) {
            $table->foreign(['id_cont_infor'], 'conte_documen')->references(['id_cont_infor'])->on('informativecontent');
            $table->foreign(['id_doc'], 'docume-document_cont')->references(['id_doc'])->on('document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_infocont', function (Blueprint $table) {
            $table->dropForeign('conte_documen');
            $table->dropForeign('docume-document_cont');
        });
    }
}

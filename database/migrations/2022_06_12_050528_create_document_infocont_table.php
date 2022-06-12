<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentInfocontTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_infocont', function (Blueprint $table) {
            $table->integer('id_doc_cont', true);
            $table->integer('id_cont_infor')->unique('id_cont_infor');
            $table->integer('id_doc')->unique('id_doc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_infocont');
    }
}

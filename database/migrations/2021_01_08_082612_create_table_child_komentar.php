<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChildKomentar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_komentar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_komentar');
            $table->foreign('id_komentar')->references('id')->on('komentar');
            $table->text('child_komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_child_komentar');
    }
}

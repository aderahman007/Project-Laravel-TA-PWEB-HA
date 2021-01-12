<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKomentarWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_wisata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_wisata')->nullable();
            $table->foreign('id_wisata')->references('id')->on('wisata');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('komentar');
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
        Schema::dropIfExists('table_komentar_wisata');
    }
}

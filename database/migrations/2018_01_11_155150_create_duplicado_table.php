<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuplicadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duplicado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lider1')->unsigned();
            $table->integer('id_lider2')->unsigned();
            $table->foreign('id_lider1')->references('id')->on('lider')->onDelete('cascade');
            $table->foreign('id_lider2')->references('id')->on('lider')->onDelete('cascade');
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
        Schema::dropIfExists('duplicado');
    }
}

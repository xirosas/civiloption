<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lider', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('direccion');
            $table->integer('estado')->default(1);
            $table->integer('id_coordinador')->unsigned();
            $table->foreign('id_coordinador')->references('id')->on('coordinador')->onDelete('cascade');                        
            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('lider');
    }
}

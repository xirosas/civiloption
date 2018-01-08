<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votante', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('ubicacion');
            $table->string('mesa');
            $table->string('puesto');
            $table->integer('voto')->default(0);
            $table->integer('estado')->default(1);
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');  
            $table->integer('id_lider')->unsigned();
            $table->foreign('id_lider')->references('id')->on('lider')->onDelete('cascade');                          
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
        Schema::dropIfExists('votante');
    }
}

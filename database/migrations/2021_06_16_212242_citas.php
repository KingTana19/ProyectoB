<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Citas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->time('hora');
            $table->string('descripcion',100);
            $table->integer('Costo');
            $table->unsignedInteger('usuario_id')->references('id')->on('users')->comment('relacion entre cita y usuario');
            $table->unsignedInteger('servicio_id')->references('id')->on('servicios')->comment('relacion entre cita y servicio');
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
        Schema::dropIfExists('citas');
    }
}

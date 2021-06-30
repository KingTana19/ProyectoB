<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_insumo', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('insumo_id')->references('id')->on('insumo')->comment('la llave foranea de insumo');
            $table->unsignedInteger('producto_id')->references('id')->on('producto')->comment('la llave foranea de producto');
            $table->integer('cantidad');
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
        Schema::dropIfExists('producto_insumo');
    }
}

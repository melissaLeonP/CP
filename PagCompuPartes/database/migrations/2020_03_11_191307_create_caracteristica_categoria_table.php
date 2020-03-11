<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicaCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristica_categoria', function (Blueprint $table) {
            $table->bigIncrements('idCaraCate');
            $table->unsignedBigInteger('idCate');
            $table->unsignedBigInteger('idCarac');
            $table->foreign('idCate')->references('idCategoria')->on('categorias');
            $table->foreign('idCarac')->references('idCaracteristica')->on('caracteristicas');
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
        Schema::dropIfExists('caracteristica_categoria');
    }
}

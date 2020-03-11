<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('idProducto');
            $table->unsignedBigInteger('idCate');
            $table->string('nombre',50);
            $table->string('descripcion',100);
            $table->string('imagen',256);
            $table->boolean('status')->default(1);
            $table->timestamps();

            // $table->foreign('idCate')->references('idCategoria')->on('categorias');
            $table->foreign('idCate')->references('idCategoria')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

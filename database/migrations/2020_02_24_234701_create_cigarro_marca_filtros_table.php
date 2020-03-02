<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCigarroMarcaFiltrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cigarro_marca_filtros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cigarro_marca_id');
            $table->unsignedBigInteger('cigarro_filtro_id');
            $table->timestamps();

            $table->foreign('cigarro_marca_id')->references('id')->on('cigarro_marcas');
            $table->foreign('cigarro_filtro_id')->references('id')->on('cigarro_filtros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cigarro_marca_filtros');
    }
}

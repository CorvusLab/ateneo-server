<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodegaNuevoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bodega_Nuevo', function (Blueprint $table) {
            $table->integer('Id_Bodega_Nuevo', true);
            $table->string('Nombre');
            $table->string('Direccion');
            $table->string('Telefono', 60);
            $table->string('Mapa')->nullable();
            $table->string('Compra_Internacional', 10)->nullable();
            $table->enum('Estado', ['Activo', 'Inactivo']);
            $table->string('Tipo', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bodega_Nuevo');
    }
}

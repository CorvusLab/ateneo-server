<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecioReguladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Precio_Regulado', function (Blueprint $table) {
            $table->integer('Id_Precio_Regulado', true);
            $table->string('Codigo_Cum', 60)->unique('Codigo_Cum');
            $table->decimal('Precio', 50);
            $table->decimal('Precio_Anterior', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Precio_Regulado');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('agendamiento_id')->nullable()->index('agendamiento_id');
            $table->dateTime('hour_start')->nullable()->index('hour_start');
            $table->bigInteger('person_id')->nullable();
            $table->string('className', 50)->nullable();
            $table->dateTime('hour_end')->nullable();
            $table->string('long', 20)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->string('backgroundColor', 50)->nullable();
            $table->enum('state', ['Activo', 'Cancelado'])->default('Activo');
            $table->enum('type', ['Nacional', 'Regional'])->nullable();
            $table->integer('share')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaces');
    }
}

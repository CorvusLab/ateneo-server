<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotations', function (Blueprint $table) {
            $table->integer('id', true)->index('Índice 1');
            $table->timestamp('dispatched_at')->nullable();
            $table->integer('person_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('description')->nullable();
            $table->double('cost', 50, 2)->nullable();
            $table->enum('state', ['Activa', 'Anulada'])->nullable()->default('Activa');
            $table->timestamps();
            $table->string('type', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dotations');
    }
}

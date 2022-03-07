<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->integer('id', true)->index('Índice 1');
            $table->integer('person_id')->default(0);
            $table->string('title', 250)->nullable();
            $table->tinyInteger('modal')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('type', 50)->nullable();
            $table->string('icon', 50)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('url', 200)->nullable();
            $table->integer('destination_id')->nullable();
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
        Schema::dropIfExists('alerts');
    }
}

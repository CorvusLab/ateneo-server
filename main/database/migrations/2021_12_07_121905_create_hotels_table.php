<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->enum('type', ['Nacional', 'Internacional'])->nullable();
            $table->string('name', 191)->nullable();
            $table->string('city_id', 191)->nullable();
            $table->string('person_contact', 191)->nullable();
            $table->string('landline', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->string('simple_rate', 191)->nullable();
            $table->string('double_rate', 191)->nullable();
            $table->enum('breakfast', ['Si', 'No'])->nullable();
            $table->enum('accommodation', ['Sencilla', 'Doble'])->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}

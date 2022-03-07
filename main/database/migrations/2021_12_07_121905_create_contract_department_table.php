<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_department', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('contract_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_department');
    }
}

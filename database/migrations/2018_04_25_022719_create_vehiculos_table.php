<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sucursal_id');
            $table->string('matricula');
            $table->string('modelo');
            $table->string('categoria');
            $table->string('num_seguro');
            $table->decimal('precio', 16, 2);

            $table->timestamps();

            $table->foreign('sucursal_id')
                ->references('id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            $table->dropForeign(['sucursal_id']);
        });
        Schema::dropIfExists('vehiculos');
    }
}

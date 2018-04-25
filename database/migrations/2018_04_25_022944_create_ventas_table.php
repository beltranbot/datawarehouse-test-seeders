<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tiempo_id');
            $table->unsignedInteger('vehiculo_id');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('sucursal_id');
            $table->unsignedInteger('empleado_id');
            $table->decimal('precio', 16, 2);
            
            $table->timestamps();

            $table->foreign('tiempo_id')
                ->references('id')->on('tiempos');
            $table->foreign('vehiculo_id')
                ->references('id')->on('vehiculos');
            $table->foreign('cliente_id')
                ->references('id')->on('clientes');
            $table->foreign('sucursal_id')
                ->references('id')->on('sucursals');
            $table->foreign('empleado_id')
                ->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign(['empleado_id']);
            $table->dropForeign(['sucursal_id']);
            $table->dropForeign(['cliente_id']);
            $table->dropForeign(['vehiculo_id']);
            $table->dropForeign(['tiempo_id']);
        });
        Schema::dropIfExists('ventas');
    }
}

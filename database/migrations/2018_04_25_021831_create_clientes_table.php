<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('municipio_id');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('pais')->default('colombia');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->timestamps();

            $table->foreign('departamento_id')
                ->references('id')->on('departamentos');
            $table->foreign('municipio_id')
                ->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['municipio_id']);
        });
        Schema::dropIfExists('clientes');
    }
}

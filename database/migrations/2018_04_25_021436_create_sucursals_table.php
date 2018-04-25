<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('municipio_id');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('director');
            $table->string('direccion');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->string('direccion_web');
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
        Schema::table('sucursals', function (Blueprint $table) {
            $table->dropForeign(['municipio_id']);
            $table->dropForeign(['departamento_id']);
        });
        Schema::dropIfExists('sucursals');
    }
}

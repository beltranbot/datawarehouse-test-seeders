<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiemposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempos', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha');
            $table->integer('dia')->nullable();
            $table->integer('mes')->nullable();
            $table->integer('anio')->nullable();
            $table->integer('dia_de_la_semana')->nullable();
            $table->integer('dia_del_anio')->nullable();
            $table->integer('vacaciones')->nullable();
            $table->integer('fin_de_semana')->nullable();
            $table->integer('mes_del_anio')->nullable();
            $table->integer('semana_del_anio')->nullable();
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
        Schema::dropIfExists('tiempos');
    }
}

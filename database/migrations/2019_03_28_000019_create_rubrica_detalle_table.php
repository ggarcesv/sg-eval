<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubricaDetalleTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('rubrica_detalle', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('estado_id')->unsigned();
            $table->bigInteger('criterio_id')->unsigned();
            $table->bigInteger('rubrica_id')->unsigned();
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('criterio_id')->references('id')->on('criterio');
            $table->foreign('rubrica_id')->references('id')->on('rubrica_autoevaluacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('rubrica_detalle');
    }
}

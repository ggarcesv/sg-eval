<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoevaluacionDetalleTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('autoevaluacion_detalle', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->float('nota', 1,1);
            $table->bigInteger('alumno_rut')->unsigned();
            $table->bigInteger('rubrica_autoevaluacion_detalle_id')->unsigned();
            $table->timestamps();

            $table->foreign('alumno_rut')->references('rut')->on('alumno');
            $table->foreign('rubrica_autoevaluacion_detalle_id')->references('id')->on('rubrica_autoevaluacion_detalle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('autoevaluacion_detalle');
    }
}

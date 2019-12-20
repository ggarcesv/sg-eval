<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionDetalleTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('evaluacion_detalle', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->float('nota', 1,1);
            $table->bigInteger('rotacion_alumno_id')->unsigned();
            $table->bigInteger('rubrica_detalle_id')->unsigned();
            $table->timestamps();

            $table->foreign('rotacion_alumno_id')->references('id')->on('rotacion_alumno');
            $table->foreign('rubrica_detalle_id')->references('id')->on('rubrica_detalle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('evaluacion_detalle');
    }
}

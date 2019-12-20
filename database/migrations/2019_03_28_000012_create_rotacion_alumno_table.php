<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRotacionAlumnoTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('rotacion_alumno', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('alumno_rut')->unsigned();
            $table->bigInteger('rotacion_grupo_id')->unsigned();
            $table->bigInteger('modulo_id')->unsigned();
            $table->timestamps();

            $table->foreign('alumno_rut')->references('rut')->on('alumno');
            $table->foreign('rotacion_grupo_id')->references('id')->on('rotacion_grupo');
            $table->foreign('modulo_id')->references('id')->on('modulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('rotacion_alumno');
    }
}

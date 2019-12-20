<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaSeccionTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('asignatura_seccion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('year')->unsigned()->required();
            $table->integer('semestre')->unsigned()->required();
            $table->integer('num_seccion')->unsigned()->required();
            $table->bigInteger('asignatura_id')->unsigned();
            $table->bigInteger('carrera_id')->unsigned();
            $table->bigInteger('docente_rut')->unsigned();
            $table->timestamps();

            $table->foreign('asignatura_id')->references('id')->on('asignatura');
            $table->foreign('carrera_id')->references('id')->on('carrera');
            $table->foreign('docente_rut')->references('rut')->on('docente');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('asignatura_seccion');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('alumno', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('rut');
            $table->string('dv',1);
            $table->string('nombre');
            $table->string('email');
            $table->string('password');
            $table->bigInteger('carrera_id')->unsigned();
            $table->bigInteger('sede_id')->unsigned();
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carrera');
            $table->foreign('sede_id')->references('id')->on('sede');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('alumno');
    }
}

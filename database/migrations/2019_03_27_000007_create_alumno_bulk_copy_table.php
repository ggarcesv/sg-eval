<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoBulkCopyTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('alumno_bc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('rut');
            $table->string('nombre');
            $table->string('email');
            $table->bigInteger('carrera_id')->unsigned();
            $table->bigInteger('sede_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('alumno_bc');
    }
}

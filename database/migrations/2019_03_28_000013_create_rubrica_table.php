<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubricaTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
        Schema::create('rubrica', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('modulo_id')->unsigned();
            $table->bigInteger('sede_tiene_carrera_id')->unsigned();
            $table->timestamps();

            $table->foreign('modulo_id')->references('id')->on('modulo');
            $table->foreign('sede_tiene_carrera_id')->references('id')->on('sede_tiene_carrera');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('rubrica');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRotacionGrupoTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('rotacion_grupo', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('rotacion_numero');
            $table->integer('asignatura_seccion');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('rotacion_grupo');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('docente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('rut');
            $table->string('dv',1);
            $table->string('nombre');
            $table->string('email');
            $table->string('password');
            $table->bigInteger('sede_id')->unsigned();
            $table->bigInteger('privilegio_id')->unsigned();
            $table->timestamps();

            $table->foreign('sede_id')->references('id')->on('sede');
            $table->foreign('privilegio_id')->references('id')->on('privilegio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('docente');
    }
}

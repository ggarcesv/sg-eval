<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedeTieneCarreraTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('sede_tiene_carrera', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('sede_id')->unsigned();
            $table->bigInteger('carrera_id')->unsigned();
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
        Schema::dropIfExists('sede_tiene_carrera');
    }
}

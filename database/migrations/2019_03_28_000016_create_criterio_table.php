<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriterioTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('criterio', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('aspecto_id')->unsigned();
            $table->timestamps();

            $table->foreign('aspecto_id')->references('id')->on('aspecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('criterio');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RubricaDetalle extends Model {

    protected $table = 'saesa__rubricas_detalles';
    protected $fillable = ['id', 'criterio_id','rubrica_id','estado'];

}

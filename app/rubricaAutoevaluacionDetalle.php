<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RubricaAutoevaluacionDetalle extends Model {

    protected $table = 'saesa__rubricas_autoevaluaciones_detalles';
    protected $fillable = ['id', 'estado','criterio_id','rubrica_autoevaluacion_id',];

}

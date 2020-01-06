<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionDetalle extends Model {
 
    protected $table = 'saesa__evaluacion_detalles';

    protected $fillable = ['id','nota','rotacion_alumno_id','rubrica_detalle_id'];

}
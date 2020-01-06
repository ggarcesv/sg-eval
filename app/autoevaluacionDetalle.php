<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoevaluacionDetalle extends Model {

    protected $table = 'saesa__autoevaluacion_detalles';

    protected $fillable = ['id','usuario_id','nota','rubrica_autoevaluacion_detalle_id','estado'];
    
}

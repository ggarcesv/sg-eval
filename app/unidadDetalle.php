<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadDetalle extends Model {
    
    protected $table = 'saesa__unidades_detalles';

    protected $fillable = ['id','nombre','estado','unidad_id'];
}

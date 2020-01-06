<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RotacionAlumnoDetalle extends Model {
    
    protected $table = 'saesa__rotacion_alumno_detalles';
    protected $fillable = ['id', 'estado', 'rotacion_grupo_id','modulo_id','usuario_id'];

}

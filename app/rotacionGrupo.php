<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RotacionGrupo extends Model {

    protected $table = 'saesa__rotacion_grupos';
    protected $fillable = ['id', 'fecha_inicio', 'fecha_termino','rotacion_num','estado','asignatura_seccion_curso_id','modulo_id','nombre'];
}

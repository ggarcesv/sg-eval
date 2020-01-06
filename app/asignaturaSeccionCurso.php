<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaSeccionCurso extends Model {

    protected $table = 'saesa__asignatura_seccion_cursos';

    protected $fillable = ['id','year','semestre','num_seccion','estado','asignatura_id','carrera_id','usuario_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

    protected $table = 'saesa__cursos';

    protected $fillable = ['id','nombre','year','num_seccion','estado','asignatura_id','carrera_id','usuario_id'];
}

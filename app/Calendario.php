<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model {

    protected $table = 'saesa__calendario_evaluaciones';

    protected $fillable = ['id','nombre','fecha','estado','asignatura_seccion_curso_id'];

}
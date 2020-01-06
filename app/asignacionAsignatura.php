<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionAsignatura extends Model {

    protected $table = 'saesa__asignacion_asignaturas';

    protected $fillable = ['id','estado','carrera_id','asignatura_id'];
}

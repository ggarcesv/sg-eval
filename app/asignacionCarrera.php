<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionCarrera extends Model {

    protected $table = 'saesa__asignacion_carreras';

    protected $fillable = ['id','estado','sede_id','carrera_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrica extends Model {
   
    protected $table = 'saesa__rubricas';
    protected $fillable = ['id', 'nombre', 'modulo_id','asignacion_carrera_id','estado'];

}

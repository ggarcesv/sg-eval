<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model {

    protected $table = 'saesa__inscripciones';

    protected $fillable = ['curso_id','usuario_id', 'estado','created_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model {

    protected $table = 'saesa__inscripciones';

    protected $fillable = ['id_curso','id_usuario'];
}

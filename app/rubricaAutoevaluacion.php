<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RubricaAutoevaluacion extends Model {

    protected $table = 'saesa__rubricas_autoevaluaciones';
    protected $fillable = ['id', 'nombre', 'estado'];

}

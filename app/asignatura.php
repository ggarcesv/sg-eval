<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {

    protected $table = 'saesa__asignaturas';

    protected $fillable = ['id','nombre','estado'];
}

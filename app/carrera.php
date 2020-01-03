<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

    protected $table = 'saesa__carreras';

    protected $fillable = ['id','nombre','estado','escuela_id'];

}
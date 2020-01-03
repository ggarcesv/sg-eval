<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model {

    protected $table = 'saesa__programas';

    protected $fillable = ['id','nombre','year','estado','asignatura_id'];

}

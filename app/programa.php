<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model {

    protected $table = 'saesa__programas';

    protected $primaryKey = 'id_programa';
    
    protected $fillable = ['id_programa','nombre_programa','year_programa','estado_programa','asignatura_id'];

}

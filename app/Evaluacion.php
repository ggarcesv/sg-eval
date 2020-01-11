<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model {
 
    protected $table = 'saesa__evaluaciones';

    protected $fillable = ['id','criterio_id','nota','rotacion_grupo_id','observacion'];

}
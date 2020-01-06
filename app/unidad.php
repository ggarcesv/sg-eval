<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model {

    protected $table = 'saesa__unidades';

    protected $primaryKey = 'id_unidad';

    protected $fillable = ['id_unidad','nombre_unidad','descripcion_unidad','estado_unidad','programa_id'];

}

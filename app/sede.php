<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model {
    
    protected $table = 'saesa__sedes';

    protected $fillable = ['id','nombre','direccion','telefono','estado'];

}

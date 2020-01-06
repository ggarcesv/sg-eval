<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    protected $table = 'saesa__roles';
    protected $fillable = ['id', 'nombre', 'estado','privilegio_id'];
    
}

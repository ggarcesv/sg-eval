<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model {

    protected $table = 'saesa__privilegios';

    protected $fillable = ['id', 'nombre', 'estado'];

}

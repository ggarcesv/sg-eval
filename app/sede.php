<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sede extends Model {
    
    protected $fillable = ['id','nombre','direccion','telefono','estado'];

}

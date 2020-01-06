<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model {
    
    protected $table = 'saesa__modulos';

    protected $fillable = ['id','nombre','estado'];
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspecto extends Model {

    protected $table = 'saesa__aspectos';

    protected $fillable = ['id','nombre','ponderacion','estado'];
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model {
    
    protected $table = 'saesa__criterios';

    protected $fillable = ['id','nombre','estado','aspecto_id'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model {

    protected $table = 'saesa__unidades';

    protected $fillable = ['id','nombre','estado','programa_id'];

}

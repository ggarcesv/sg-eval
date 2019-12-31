<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model {

    protected $table = 'saesa__escuelas';

    protected $fillable = ['id','nombre','estado'];
}

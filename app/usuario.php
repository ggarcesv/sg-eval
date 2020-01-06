<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    
    protected $table = 'saesa__usuarios';

    protected $fillable = ['id','rut','nombre','email','password','estado','rol_id','sede_id'];

}

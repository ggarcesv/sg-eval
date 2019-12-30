<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $fillable = ['id', 'nombre', 'estado','privilegioId'];
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $table = 'saesa__usuarios';

    use Notifiable;

    protected $fillable = ['id','rut','nombre','email','password','estado','rol_id','sede_id'];
}

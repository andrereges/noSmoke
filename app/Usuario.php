<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'login', 'senha',
    ];
    protected $hidden = [
        'senha', 'remember_token',
    ];
    protected $casts = [
        'login_verified_at' => 'datetime',
    ];
    protected $table = "usuarios";
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{
    protected $table = 'acoes';
    protected $fillable = ['nome', 'valor'];
}

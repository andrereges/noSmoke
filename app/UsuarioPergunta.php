<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPergunta extends Model
{
    protected $fillable = ['usuario_id', 'pergunta_id'];
}

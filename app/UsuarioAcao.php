<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioAcao extends Model
{
    protected $table = 'usuario_acoes';
    protected $fillable = ['usuario_id', 'acao_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imagem;

class CigarroMarca extends Model
{
    const CAMINHO_IMAGEM = 'static/imagens/cigarro-marcas/';

    public function imagem()
    {
        return $this->morphOne(Imagem::class, 'imageavel');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imagem;
use App\CigarroFiltro;

class CigarroMarca extends Model
{
    protected $fillable = ['nome', 'preco', 'quantidade'];

    public function imagem()
    {
        return $this->morphOne(Imagem::class, 'imageavel');
    }

    public function filtros()
    {
        return $this->belongsToMany(CigarroFiltro::class, 'cigarro_marca_filtros', 'cigarro_marca_id', 'cigarro_filtro_id')
            ->withTimestamps();
    }

    public function getPathImagemAttribute()
    {
        return 'public/static/imagens/cigarro-marcas/';
    }

    public function getFullPathImagemAttribute()
    {
        return sprintf('%s%s', $this->getPathImagemAttribute, $this->nome);
    }
}

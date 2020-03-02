<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CigarroMarca;

class CigarroFiltro extends Model
{
    public function marcas()
    {
        return $this->belongsToMany(CigarroMarca::class, 'cigarro_marca_filtros', 'cigarro_filtro_id', 'cigarro_marca_id')
            ->withTimestamps();
    }
}

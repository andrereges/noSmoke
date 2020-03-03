<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';
    protected $fillable = ['nome'];

    public function imageavel()
    {
        return $this->morphTo();
    }

    public function getExtensaoAttribute()
    {
        return array_slice(explode('.', $this->nome), -1)[0];
    }
}

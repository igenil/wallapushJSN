<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['id', 'nombre'];

    public function anuncio()
    {
        return $this->hasMany(Categoria::class);
    }
}

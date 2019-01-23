<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table ='anuncios';
    protected $fillable = [
        'id', 'producto', 'id_categoria', 'precio', 'estado', 'vendido', 'descripcion', 'id_vendedor', 'nuevo', 'img'
        ];

    public function categoria()
    {
        return $this->hasOne(Anuncio::class);
    }

    public function usuario()
    {
        return $this->BelongsTo(Anuncio::class);
    }
}

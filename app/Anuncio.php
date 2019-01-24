<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\User;

class Anuncio extends Model
{
    protected $table ='anuncios';
    protected $fillable = [
        'id', 'producto', 'id_categoria', 'precio', 'vendido', 'descripcion', 'id_vendedor', 'nuevo'
        ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_vendedor');
    }
}

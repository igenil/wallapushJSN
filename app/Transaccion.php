<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Anuncio;
class Transaccion extends Model
{
    protected $table ='transaccions';
    protected $fillable = [
        'id', 'id_anuncio', 'id_comprador', 'valoracion'
        ];
     
    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class, 'id_anuncio');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_comprador');
    }
}

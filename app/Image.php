<?php

namespace App;
use App\Image;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['id', 'id_anuncio', 'img'];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}

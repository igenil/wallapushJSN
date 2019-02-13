<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function indexeditanuncioanuncios($id){
        $imagenes = Image::find($id);
        dd($imagenes);
    }
}

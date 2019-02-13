<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function editimages($id){
        $imagenes = Image::where('id_anuncio', $id)->get();

        return view('anuncio.images', compact('imagenes'));
    }
}

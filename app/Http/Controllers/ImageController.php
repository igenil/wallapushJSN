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

    public function store(Request $request, $id)
    { 
        $ruta = public_path().'/image';
        $imagenOriginal= $request->file('uploadedfile');
    
        $image= Image::create([
            'id_anuncio' => $id,
            'img' => $imagenOriginal->getClientOriginalName()
        ]);

        \Storage::disk('local')->put($imagenOriginal->getClientOriginalName(), \File::get($imagenOriginal));

        $imagenes = Image::where('id_anuncio', $id)->get();
        return view('anuncio.images', compact('imagenes'));
    }
    
    public function destroy($id)
    {
        $imagen = Image::find($id);
        $idanuncio = $imagen->id_anuncio;
        $Nimagen = Image::where('id_anuncio', $idanuncio)->get();
        if(count($Nimagen)>1){
            $imagen->delete();  
            $imagenes = Image::where('id_anuncio',$idanuncio)->get();
            return view('anuncio.images', compact('imagenes'));
        }else{
            $imagenes = Image::where('id_anuncio',$idanuncio)->get();
            return back()->with('success',"Lo sentimos, tu anuncio debe tener al menos una imagen.");
        }
       
    }
}

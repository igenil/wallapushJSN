<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\Categoria;

use App\Http\Requests\AnuncioRequest;


class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::all();
        return view("anuncio.detail",compact('anuncios'));
    }

    public function indexaddanuncio()
    {
        $categorias=Categoria::all();
    }

    public function indexeditanuncio($id){
        $anuncio = Anuncio::find($id);
        return view("anuncio.edit", compact('anuncio'));
    }

    public function store(AnuncioRequest $request)
    {
        
    }

    public function update(AnuncioRequest $request, $id)
    {
        $anuncio = Anuncio::find($id);
        $anuncio -> producto = $request -> producto;
        $anuncio -> id_categoria = $request -> id_categoria;
        $anuncio -> precio = $request -> precio;
        $anuncio -> estado = $request -> estado;
        $anuncio -> vendido = $request -> vendido;
        $anuncio -> descripcion = $request -> descripcion;
        $anuncio -> id_vendedor = $request -> id_vendedor;
        $anuncio -> save();
        return redirect('/company')->with('message', ['success', __("Company edited successfully")]);
    }

    public function destroy($id)
    {
        $anuncios = Anuncio::find($id);
        $anuncios = Anuncio::where('id_anuncio', $id)->get();
        $anuncios->delete();
        $anuncios = anuncio::all();
        return redirect('/anuncio')->with('message', ['success', __("Anuncio borrado correctamente !")]);
    }
}

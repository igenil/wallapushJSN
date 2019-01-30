<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Anuncio;
use App\Categoria;
use App\User;

use App\Http\Requests\AnuncioRequest;

class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::with('categoria')->get();

        return view("anuncio.detail",compact('anuncios'));
    }

    public function index_usuario(){

        $anuncios = Anuncio::with('categoria', 'usuario')->paginate(3);

        return view('anuncio.index_usuario', compact('anuncios', 'categoria', 'usuario'));
    }

    public function indexaddanuncio()
    {
        $categorias=Categoria::all();
        $usuarios=User::all();

        return view('anuncio.create', compact('categorias', 'usuarios'));
    }

    public function indexeditanuncio($id){
        $anuncio = Anuncio::find($id);
        $categorias = Categoria::all();
        return view("anuncio.edit", compact('anuncio','categorias'));
    }

    public function indexAnuncioCategoria($id){
        $anuncios =Anuncio::where('id_categoria',$id)->get();
        return view("anuncio.anunciosCategoria", compact('anuncios'));
    }

    public function store(AnuncioRequest $request)
    { 
        $user=Auth::id();
        $anuncio = new Anuncio(array(
            'producto' => $request->get('producto'),
            'id_categoria' => $request->get('id_categoria'),
            'precio' => $request->get('precio'),
            'nuevo' => $request->get('nuevo'),
            'descripcion' => $request->get('descripcion'),
            'id_vendedor' => $user,
        ));

        $anuncio->save();
        return redirect('/anuncios');
    }

    public function update(Request $request, $id)
    {
        $user=Auth::id();
        $anuncio = Anuncio::find($id);
        $anuncio -> producto = $request -> producto;
        $anuncio -> id_categoria = $request -> id_categoria;
        $anuncio -> precio = $request -> precio;
        $anuncio -> nuevo = $request -> nuevo;
        $anuncio -> vendido = $request -> vendido;
        $anuncio -> descripcion = $request -> descripcion;
        $anuncio -> id_vendedor = $user;
        $anuncio -> save();
        return redirect('/listAnuncios')->with('message', ['success', __("Anuncio edited successfully")]);
    }

    public function destroy($id)
    {
        $anuncios = Anuncio::find($id);
        $anuncios->delete();
        return redirect('/listAnuncios')->with('success', "Anuncio borrado correctamente !");
    }

    public function show_anuncio($id){

        $anuncio = Anuncio::find($id);
        return view("anuncio.show_anuncio", compact('anuncio'));

    }
}

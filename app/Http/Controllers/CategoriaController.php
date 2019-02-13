<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriasRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::All(); 

        return view("categorias.detail",compact('categorias'));
    }

    public function indexusuarios()
    {
        $categorias = Categoria::All(); 
        return view("categorias.detailUser",compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categorias.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriasRequest $request)
    {
        $categorias= Categoria::create($request->all());
        $categorias = Categoria::All(); 
        return view("categorias.detail",compact('categorias'))->with('correcto',"Categoria añadida correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view("categorias.edit",compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriasRequest $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria -> nombre = $request -> nombre;
        $categoria -> save();
        $categorias = Categoria::All(); 
        return view("categorias.detail", compact('categorias'))->with('correcto',"Categoria editada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = Categoria::find($id);
        $categorias->delete();       
        return back()->with('correcto',"Categoria eliminada correctamente");
    }
}

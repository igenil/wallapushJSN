<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\Transaccion;
use App\Categoria;
use App\User;
use \PDF;


class TransaccionController extends Controller
{
    public function index()
    {
        $users = User::all();
        $dinero = 0;
        $usuarios= array();
        foreach($users as $user){
            $ventas = Anuncio::where('id_vendedor', $user->id)->where('vendido', 1)->get();
            foreach($ventas as $venta){
                $dinero += $venta->precio;
            }
            array_push($usuarios, ['name' => $user->name, 'dinero' => $dinero]);
            $dinero = 0;  
        }
        $usuarios = collect($usuarios)->sortBy('dinero')->reverse()->toArray();

        $users = User::all();
        $valoracion = 0;
        $usuarios2= array();
        foreach($users as $user){
            $ventas = Anuncio::where('id_vendedor', $user->id)->where('vendido', 1)->get();
            foreach($ventas as $venta){
                $trans = Transaccion::where('id_anuncio', $venta->id)->get();
                
                if ($trans[0]->valoracion==null){
                    $aux=0;
                } else{
                    $aux=$trans[0]->valoracion;
                }
                $valoracion += $aux;
            }
            array_push($usuarios2, ['name' => $user->name, 'valoracion' => $valoracion]);
            $valoracion = 0;  
        }
        $usuarios2 = collect($usuarios2)->sortBy('valoracion')->reverse()->toArray();

        return view("transacciones.detail",compact('usuarios','usuarios2'));
    }

    public function index_categoria_fecha1()
    {
        $categoria = Categoria::first();
        $ventas = Anuncio::where('id_categoria', $categoria->id)->where('vendido', 1)->get();
        $trans= array();
        foreach($ventas as $venta){
            $transa  = Transaccion::where('id_anuncio',$venta->id)->whereBetween('created_at',[\Carbon\Carbon::tomorrow()->subYear(),\Carbon\Carbon::tomorrow()])->with('anuncio','usuario')->get();
            array_push($trans , [$transa]);
        }
        $categorias = Categoria::all();
        $cat = Categoria::where('id', $categoria->id)->get();
        $fecha1 = \Carbon\Carbon::tomorrow()->subYear();
        $fecha2 = \Carbon\Carbon::tomorrow();
        return view("transacciones.detail3",compact('fecha1', 'fecha2', 'cat','trans','anuncio','categorias', 'categoria'));
    }

    public function index_categoria_fecha(Request $request)
    {
        $ventas = Anuncio::where('id_categoria', $request->categoria)->where('vendido', 1)->get();
        $categoria = Categoria::first();
        $trans= array();
        foreach($ventas as $venta){
            $transa = Transaccion::where('id_anuncio',$venta->id)->whereBetween('created_at',[$request->fecha1 ,\Carbon\Carbon::createFromFormat('Y-m-d',$request->fecha2)->addDay()])->with('anuncio','usuario')->get();
            array_push($trans , [$transa]);
        }
        $cat = Categoria::where('id',$request->categoria)->get();
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $categorias = Categoria::all();
        return view("transacciones.detail3",compact('fecha1', 'fecha2', 'cat','trans','anuncio','categorias', 'categoria'));
    }

    public function generarPDF($categoria, $fecha1, $fecha2)
    {
        $ventas = Anuncio::where('id_categoria', $categoria)->where('vendido', 1)->get();
        $categoria = Categoria::where('id', $categoria)->get();

        $trans= array();
        foreach($ventas as $venta){
            $transa = Transaccion::where('id_anuncio',$venta->id)->whereBetween('created_at',[$fecha1 , $fecha2])->with('anuncio','usuario')->get();
            array_push($trans , [$transa]);
        }
        $fecha1 = \Carbon\Carbon::parse($fecha1)->format('d/m/Y');
        $fecha2 = \Carbon\Carbon::parse($fecha2)->format('d/m/Y');
        $pdf = PDF::loadView('transacciones.pdf',compact('trans', 'categoria', 'fecha1', 'fecha2'));
        return $pdf->download('pdf.pdf');
    }

}

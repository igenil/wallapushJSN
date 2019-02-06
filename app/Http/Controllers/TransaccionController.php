<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\Transaccion;
use App\User;

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
        return view("transacciones.detail",compact('usuarios'));
    }

    public function index_valoraciones()
    {
        $users = User::all();
        $valoracion = 0;
        $usuarios= array();
        foreach($users as $user){
            $ventas = Anuncio::where('id_vendedor', $user->id)->where('vendido', 1)->get();
            foreach($ventas as $venta){
                $trans = Transaccion::where('id_anuncio',$venta->id)->get();
                
                if ($trans[0]->valoracion==null){
                    $aux=0;
                } else{
                    $aux=$trans[0]->valoracion;
                }
                $valoracion += $aux;
            }
            array_push($usuarios, ['name' => $user->name, 'valoracion' => $valoracion]);
            $valoracion = 0;  
        }
        $usuarios = collect($usuarios)->sortBy('valoracion')->reverse()->toArray();
        return view("transacciones.detail2",compact('usuarios'));
    }

    public function index_categoria_fecha()
    {
        $ventas = Anuncio::all();
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
        //dd($usuarios);
        return view("transacciones.detail",compact('usuarios'));
    }

}

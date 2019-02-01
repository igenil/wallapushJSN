<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\Transaccion;

class TransaccionController extends Controller
{
    public function index()
    {
        $ventas = Transaccion::all();
        return view("transacciones.detail",compact('ventas'));
    }

}

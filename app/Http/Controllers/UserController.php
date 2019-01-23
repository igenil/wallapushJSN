<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate();           
        return view('user.index',compact('users'));
    }

    public function deshabilitar($id){

        $users = User::find($id);
        $users -> actived = false;
        $users -> save();
        
        return back()->with('succes', 'HAS DESAHABILITADO LA CUENTA!!');
    }

    public function habilitar($id){

        $users = User::find($id);
        $users -> actived = true;
        $users -> save();
        
        return back()->with('succes', 'HAS HABILITADO LA CUENTA!!');
    }

    public function perfil($id){
        $users = User::find($id);
        return view('user.perfil', compact('users'));
    }

    public function edit_perfil($id){
        $users = User::find($id);
        return view('user.edit', compact('users', 'id'));
    }

    //METODO ACTUALIZAR
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users -> name = $request -> name;
        $users -> email = $request -> email;
        $users -> role = $request -> role;
        $users -> localidad = $request -> localidad;
        $users -> save();
        return redirect()->route('perfil', ['id' => $id]);
    }

    //ELIMINAR UN USUARIO
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();      
        return back();
    }

    //METODO SUMAR SALDO
    public function sumar_saldo($id){
        $user = User::find($id);
        $user -> saldo = $user->saldo+1;
        $user -> save();

        return back();
    }

    //METODO RESTAR SALDO
    public function restar_saldo($id){
        $user = User::find($id);
        if($user -> saldo == 0){
            $user -> saldo = 0;
        }else{
            $user -> saldo = $user->saldo-1;
        }
        $user -> save();

        return back();
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

use App\Http\Requests\UsuariosRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate();           
        return view('user.index',compact('users'));
    }

    public function showEstadosCuentas(){
        $users1 = User::where('actived', 1)->paginate();
        $users2 = User::where('actived', 0)->paginate();
        return view('user.showEstadosCuentas', compact('users1', 'users2'));
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
    public function update(UsuariosRequest $request, $id)
    {
        $users = User::find($id);
        $users -> name = $request -> name;
        $users -> email = $request -> email;
        $users -> role = $request -> role;
        $users -> localidad = $request -> localidad;
        $users -> saldo = $request -> saldo;

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

    
}

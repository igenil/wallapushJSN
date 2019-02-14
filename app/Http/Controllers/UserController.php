<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Transaccion;
use App\Anuncio;
use App\Image;
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

    public function deshabilitar(Request $request){

        foreach($request->arrayUser as $user){
            $users = User::find($user);
            $users -> actived = false;
            $users -> save();
        }
             
        return back()->with('succes', 'HAS DESAHABILITADO LA CUENTA!!');
    }

    public function habilitar(Request $request){

        foreach($request->arrayUser as $user){
            $users = User::find($user);
            $users -> actived = true;
            $users -> save();
        }
        
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
        $anuncios = Anuncio::where('id_vendedor', $id)->get();
        $transaccion = Transaccion::where('id_comprador', $id)->get();
        $comprado = False;

        if (count($transaccion) == 0) {
            for ($i=0; $i < count($anuncios); $i++) { 
                if ($anuncios[$i]->vendido == 1){
                    $comprado = True;
                }
            }
            if (!$comprado) {
                for ($i=0; $i < count($anuncios); $i++) { 
                    $anuncio = Anuncio::find($anuncios[$i]->id);
                    $imagenes = Image::where('id_anuncio',$anuncios[$i]->id)->get();
                    $num = count($imagenes);
                    for ($a=0; $a < $num; $a++) { 
                        $imagenes = Image::find($imagenes[$a]->id);
                        $imagenes->delete(); 
                    }
                    $anuncio->delete(); 
                    return back();
                }
                
                $user = User::find($id);
                $user->delete(); 
                return back();
            }else{
                return back()->with('error', 'Error al eliminar: este usuario tiene productos comprados o vendidos');
            }
        }else{
            return back()->with('error', 'Error al eliminar: este usuario tiene productos comprados o vendidos');
        }
    }

    
}

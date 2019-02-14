<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Anuncio;
use App\Categoria;
use App\User;
use App\Transaccion;
use App\Image;

use App\Http\Requests\AnunciosEditRequest;
use App\Http\Requests\AnuncioRequest;
use App\Http\Requests\AnuncioUserRequest;
use App\Http\Requests\CategoriasRequest;

class AnuncioController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::with('categoria')->get();

        return view("anuncio.detail",compact('anuncios'));
    }

    public function index_usuario(){

        $anuncios = Anuncio::with('categoria', 'usuario')->where('vendido', 0)->paginate(6);

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

    public function indexeditanuncioUser($id){
        $anuncio = Anuncio::find($id);
        $categorias = Categoria::all();
        return view("anuncio.editUser", compact('anuncio','categorias'));
    }

    public function indexAnuncioCategoria($id){
        $anuncios =Anuncio::where('id_categoria',$id)->where('vendido', 0)->get();
        $categoria = Categoria::find($id);
        return view("anuncio.anunciosCategoria", compact('anuncios','categoria'));
    }

    public function store(AnuncioRequest $request)
    { 

        $user=Auth::id();
            $anuncio = Anuncio::create([
                'producto' => $request->get('producto'),
                'id_categoria' => $request->get('id_categoria'),
                'precio' => $request->get('precio'),
                'nuevo' => $request->get('nuevo'),
                'descripcion' => $request->get('descripcion'),
                'id_vendedor' => $user,
            ]);

        $ruta = public_path().'/image';
        $imagenOriginal= $request->file('uploadedfile');

        foreach($imagenOriginal as $ima) {  
        
            $image= Image::create([
                'id_anuncio' => $anuncio->id,
                'img' => $ima->getClientOriginalName()
            ]);
            \Storage::disk('local')->put($ima->getClientOriginalName(), \File::get($ima));

        }
        return redirect('/anuncios');

          
    }

    protected function random_string(){
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
        for($i=0; $i<10; $i++){
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    public function updateUser(AnuncioUserRequest $request, $id){

        $user=Auth::id();
        $anuncio = Anuncio::find($id);
        $anuncio -> producto = $request -> producto;
        $anuncio -> id_categoria = $request -> id_categoria;
        $anuncio -> precio = $request -> precio;
        $anuncio -> nuevo = $request -> nuevo;
        $anuncio -> descripcion = $request -> descripcion;
        $anuncio -> id_vendedor = $user;
        $anuncio -> save();
        return redirect('/anuncios')->with('message', ['success', __("Anuncio edited successfully")]);

    }

    public function update(AnunciosEditRequest $request, $id)
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
        $imagenes = Image::where('id_anuncio',$id)->get();
        for ($i=0; $i < count($imagenes); $i++) { 
            $imagenes[$i]->delete();  
        }
        $anuncios = Anuncio::find($id);
        $anuncios->delete();
        return redirect('/listAnuncios')->with('success', "Anuncio borrado correctamente !");
    }

    public function destroyUser($id)
    {
        $imagenes = Image::where('id_anuncio',$id)->get();
        for ($i=0; $i < count($imagenes); $i++) { 
            $imagenes[$i]->delete();  
        }
        $anuncios = Anuncio::find($id);
        $anuncios->delete();
        return redirect('/anuncios')->with('danger', "Anuncio borrado correctamente !");
    }

    public function show_anuncio($id){

        $anuncio = Anuncio::find($id);
        return view("anuncio.show_anuncio", compact('anuncio'));

    }
    
    public function comprar($id_anuncio, $id_comprador, $id_vendedor){
        $anuncio = Anuncio::find($id_anuncio);
        $comprador = User::find($id_comprador);
        $vendedor = User::find($id_vendedor);

        if ($anuncio->precio > $comprador->saldo) {
            return back()->with('success',"Lo sentimos, no tienes suficiente dinero...");
        }else{
            $comprador->saldo -= $anuncio->precio;
            $vendedor->saldo += $anuncio->precio;
            $anuncio -> vendido = 1;
            $comprador -> save();
            $vendedor -> save();
            $anuncio -> save();
            $anuncios = Anuncio::with('categoria')->get();

            $transaccion = new Transaccion(array(
                'id_anuncio' => $id_anuncio,
                'id_comprador' => $id_comprador,
            ));
    
            $transaccion->save();

            return redirect('/anuncios')->with('success',"Gracias por tu compra. No te olvides de valorarla");
        }
    }

    public function filtrar_nombre(Request $req){

        $producto = $req -> producto;   
        $anuncios = Anuncio::where('vendido', 0)->where('producto', 'LIKE', "%$producto%")->orWhere('descripcion', 'LIKE', "%$producto%")->paginate(6);

        return view('anuncio.index_usuario', compact('anuncios'));
    }

}

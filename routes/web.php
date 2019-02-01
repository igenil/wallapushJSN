<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Mostrar usuarios
Route::get('/listusers', 'UserController@index');
//Desahabilitar Usuario
Route::put('/listusers/{id}', 'UserController@deshabilitar');
//Habilitar Usuario
Route::put('/listusers2/{id}', 'UserController@habilitar');
//Ir al perfil del Usuario
Route::get('/perfil/{id}', 'UserController@perfil')->name('perfil');
//Eliminar usuarios
Route::delete('/deleteuser/{id}', 'UserController@destroy');
//Editar Usuario
Route::get('/edituser/{id}', 'UserController@edit_perfil');
//Actualizar Usuario
Route::put('/updateuser/{id}', 'UserController@update');
//Sumar saldo usuario
Route::put('/edituser/edituser1/{id}', 'UserController@sumar_saldo');
//Restar saldo usuario
Route::put('/edituser/edituser2/{id}', 'UserController@restar_saldo');

//Mostrar categorias
Route::get('/listCategorias', 'CategoriaController@index');
//Mostrar categorias para usuarios
Route::get('/listCategoriasusuarios', 'CategoriaController@indexusuarios');
//Eliminar categorias
Route::delete('/deleteCategoria/{id}', 'CategoriaController@destroy');
//Mostrar formulario categorias
Route::get('/addCategoria', 'CategoriaController@create');
//Añadir categorias
Route::post('/addCategoriaForm', 'CategoriaController@store');
//Mostrar formulario editar categorias
Route::get('/editCategoria/{id}', 'CategoriaController@edit');
//Editar categorias
Route::post('/editCategoriaForm/{id}', 'CategoriaController@update');


//Mostrar anuncios para usuarios
Route::get('anuncios', 'AnuncioController@index_usuario');
//Mostrar anuncios por categoria
Route::get('anunciosCategoria/{id}', 'AnuncioController@indexAnuncioCategoria');
//Mostrar anuncios para usuarios para comprar el producto
Route::get('showAnuncio/{id}', 'AnuncioController@show_anuncio');
//Comprar
Route::get('comprar/{id_anuncio}/{id_comprador}/{id_vendedor}', 'AnuncioController@comprar')->name('comprar');

Route::get('listAnuncios', 'AnuncioController@index');
Route::get('addanuncio', 'AnuncioController@indexaddanuncio');
Route::get('editanuncio/{id}', 'AnuncioController@indexeditanuncio');
Route::post('addanuncio1', 'AnuncioController@store');
Route::delete('anuncio/{id}', 'AnuncioController@destroy');
Route::post('editanuncio1/{id}', 'AnuncioController@update')->name("editarAnuncio");

//Route::get('{chocos?}/compras/{id}', 'ComprasController@index');
Route::get('compras', 'ComprasController@index')->name("compras");
Route::get('ventas', 'VentasController@index')->name("ventas");
Route::get('ranking', 'TransaccionController@index');

//Añadir Valoracion
Route::post('/addValoracion', 'ComprasController@store');



//Editar un usuario
//Route::get('/edituser/{id}','Controller@edit');
//Route::put('/editsuser/{id}','Controller@update');

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
//Mostrar Estados de Cuentas para Admin
Route::get('/showEstadosCuentas', 'UserController@showEstadosCuentas')->name('showEstados');
//FUNCION DESHABILITAR
Route::post('/deshabilitar', 'UserController@deshabilitar')->name('deshabilitar');
//FUNCION HABILITAR
Route::post('/habilitar', 'UserController@habilitar')->name('habilitar');
//Ir al perfil del Usuario
Route::get('/perfil/{id}', 'UserController@perfil')->name('perfil');
//Eliminar usuarios
Route::delete('/deleteuser/{id}', 'UserController@destroy');
//Editar Usuario
Route::get('/edituser/{id}', 'UserController@edit_perfil');
//Actualizar Usuario
Route::put('/updateuser/{id}', 'UserController@update');


//Mostrar categorias
Route::get('/listCategorias', 'CategoriaController@index');
//Mostrar categorias para usuarios
Route::get('/listCategoriasusuarios', 'CategoriaController@indexusuarios');
//Eliminar categorias
Route::delete('/deleteCategoria/{id}', 'CategoriaController@destroy');
//Mostrar formulario categorias
Route::get('/addCategoria', 'CategoriaController@create');
//Añadir categorias
Route::post('/addCategoriaForm', 'CategoriaController@store')->name('addCategoriaForm');
//Mostrar formulario editar categorias
Route::get('/editCategoria/{id}', 'CategoriaController@edit');
//Editar categorias
Route::post('/editCategoriaForm/{id}', 'CategoriaController@update')->name('editarCategoriaForm');


//Mostrar anuncios para usuarios
Route::get('anuncios', 'AnuncioController@index_usuario');
//Mostrar anuncios por categoria
Route::get('anunciosCategoria/{id}', 'AnuncioController@indexAnuncioCategoria');
//Mostrar anuncios para usuarios para comprar el producto
Route::get('showAnuncio/{id}', 'AnuncioController@show_anuncio');
//Comprar
Route::get('comprar/{id_anuncio}/{id_comprador}/{id_vendedor}', 'AnuncioController@comprar')->name('comprar');

//Mostrar anuncios para administrador
Route::get('/listAnuncios', 'AnuncioController@index');
//Mostrar vista añadir anuncio
Route::get('addanuncio', 'AnuncioController@indexaddanuncio');
//Mostrar vista de editar anuncio
Route::get('editanuncio/{id}', 'AnuncioController@indexeditanuncio');
//Mostrar vista de editar imagenes de anuncios
Route::get('editimagenesanuncio/{id}', 'ImageController@editimages')->name('editimages');
//Añadir un anuncio
Route::post('addanuncio1', 'AnuncioController@store');
//Eliminar un anuncio
Route::delete('anuncio/{id}', 'AnuncioController@destroy');
//Editar un anuncio
Route::post('editanuncio1/{id}', 'AnuncioController@update')->name("editarAnuncio");
//Filtrar anuncio
Route::get('filtroAnuncio/', 'AnuncioController@filtrar_nombre');

Route::get('compras', 'ComprasController@index')->name("compras");
Route::get('ventas', 'VentasController@index')->name("ventas");
Route::get('ranking', 'TransaccionController@index');
Route::get('rankingvalor', 'TransaccionController@index_valoraciones');
Route::get('categoriafecha1/', 'TransaccionController@index_categoria_fecha1');
Route::post('categoriafecha/', 'TransaccionController@index_categoria_fecha');
// Route::get('generarpdf/{trans}','TransaccionController@generarPDF');
Route::get('generarpdf/{categoria}/{fecha1}/{fecha2}', 'TransaccionController@generarPDF')->name('pdfs');

//Añadir Valoracion
Route::post('/addValoracion/{id}', 'ComprasController@update')->name('addValoracion');



//Editar un usuario
//Route::get('/edituser/{id}','Controller@edit');
//Route::put('/editsuser/{id}','Controller@update');

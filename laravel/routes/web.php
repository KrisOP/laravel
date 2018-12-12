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

//Route::get('/', function () {
  //  return view('welcome'); //lo que el usuario ve
//});//ruta por defecto


//Crear mas URLs

/*Route::get ('/sobrenosotros', function ()
{
		return "Soy Kristopher Ortega estudiante de la universidad nacional de ingenieria";
});

Route::get ('/post/{id}/{nombre}', function ($id,$nombre) //pasar los parametros a una url
{
		return "Este es el post # " . $id . " Escrito por " . $nombre;
})-> where ('nombre','[a-zA-Z]+');

Route::get ('/contacto', function (){
	return "Escribeme a krisopnic@gmail.com";
});*/

//Route::get('/inicio/{id}','ejemplo3controller@index');//llamando al metodo desde los controladores con parametros

/*Route::get('/',"PaginasController@inicio");
Route::get('/inicio',"PaginasController@inicio");
Route::get('/quienessomos',"PaginasController@quienessomos");
Route::get('/blog',"PaginasController@blog");*/

Route::resource ("post","ejemplo3controller");

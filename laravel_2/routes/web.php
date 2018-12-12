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
    //return view('welcome');
//});
//INCLUIR LOS MODELOS
use App\Articulo;
use App\cliente;

Route::get ('/',"MiControlador@index");
Route::get ('/inicio',"MiControlador@index");
Route::get ('/crear',"MiControlador@create");
Route::get ('/articulos',"MiControlador@store");
Route::get ('/mostrar',"MiControlador@show");
Route::get ('/contacto',"MiControlador@contactar");
Route::get ('/galeria',"MiControlador@galeria");

/*Route::get ("/insertar",  function()
{
	DB::insert("INSERT INTO articulos (profesion,Nombre_Articulo,Precio,pais_origen,observaciones,seccion) values (?,?,?,?,?,?)", ["Ingenieria", "Jarron",15.2,"Japon","Ceramica","Ganga"]);
});

Route::get ("/leer",  function()
{
	$resultados=DB::select("SELECT * FROM articulos where id=?",[1]);

	foreach ($resultados as $articulo)
	{
	 return $articulo->Nombre_Articulo;
	}
});

Route::get ("/actualiza",  function()
{
	DB::update("UPDATE articulos SET seccion='DECORACION' WHERE id=?",[2]);
});*/

/***********************MANIPULAR LAS BASES DE DATOS CON ELOQUENT*****************************/
/*Route::get("/leer", function ()
{
	$articulos=App\Articulo::all();//almacenar todas las variables en arreglo que tiene la tabla //App es el namespace de la clase del Articulo

	foreach($articulos as $articulo) //recorrer el arreglo e imprimir
	{
		echo "Nombre" .  $articulo->Nombre_Articulo . "Precio: ". $articulo->Precio. "<br>" ;
	}
});*/

/*Route::get("/leer", function ()
{
	//$articulos=App\Articulo::where ("observaciones","Ceramica") ->orderby("Nombre_Articulo", "desc")->get();

	$articulos=App\Articulo::where ("observaciones","Ceramica") ->max('Precio');

	return $articulos;
});*/



Route::get("/leer", function ()
{

	//$articulos=App\Articulo::where ("id",4) ->get();
	$articulos = App\Articulo::onlyTrashed()//Leer registros que esten en papelera por softdelete/borradosuave
	                ->where('id', 4)
	                //->get();//para obtener
	                ->restore();//para restaurar los datos
		return $articulos;
});


/**********UTILIZANDO ELOQUENT INSERCION Y CREACION DE MODELOS*********/
Route::get("/insertar", function ()
{
	$articulos = new App\Articulo; //Nueva instancia
	$articulos->Nombre_Articulo="Pantalones";
	$articulos->Precio=50.50;
	$articulos->profesion="Moda";
	$articulos->pais_origen="Guatemala";
	$articulos->observaciones="De calidad";
	$articulos->seccion="ropa";

	$articulos->save();

});

/**********UTILIZANDO ELOQUENT ACTUALIZAR DE MODELOS*********
Route::get("/actualizar", function ()
{
	$articulos = App\Articulo::find(5); //Actualizar los datos del id 5
	$articulos->Nombre_Articulo="Pantalones";
	$articulos->Precio=150.25;
	$articulos->profesion="Moda";
	$articulos->pais_origen="Guatemala";
	$articulos->observaciones="De calidad";
	$articulos->seccion="ropa";

	$articulos->save();

});*/

/*******Actualizar un campo con contenidos parecidos. Es decir, observaciones hay varios elementos que dicen @Ceramica actualizar a Menaje //Actualizar con un criterio***************
Route::get("/actualizar", function ()
{
	App\Articulo::where("observaciones","Ceramica")->update(["observaciones"=>"menaje"]); //Actualizar el campo, y el contenido que tenga "Ceramica"//Array asociativo
	

});*/

/***Actualizar el precio donde el pais de origen sera Japon y observaciones menaje//Actualizar con dos Criterios ***/

Route::get("/actualizar", function ()
{
	App\Articulo::where("observaciones","menaje")->where ("pais_origen", "Japon")->update(["precio"=>100]); //Actualizar el campo precio, cuando sea menaje y Japon tenga "Japon y menaje"//Array asociativo con dos criterios
});

/*Eliminar con Eloquent*/


Route::get("/borrar", function ()
{
	/*$articulo=App\Articulo::find(2);//borrar cuando el id sea 2
	$articulo->delete();*/

	App\Articulo::where("pais_origen","Japon")->delete();//Eliminar teniendo como parametro el valor de un campo en este caso Japon del pais_origen
});

/************Insertar registro en la base de datos con el metodo 'create'***********/


Route::get("/insercionvarios", function ()
{
	
	App\Articulo::create(["profesion"=>"Fisico", "Nombre_Articulo"=> "Cronometro", "Precio"=>1290, "pais_origen"=>"Mexico", "observaciones"=>"en buen estado", "seccion"=>"utiles fisicos"]);//Para insertar esto, y no de error al ejecutar hay que agregar en el modelo 'Articulo' un arreglo protected con los nombre de cada campo a insertar 
});



/********USANDO EL SOFT DELETE PARA ELIMINAR REGISTROS DE LA BASE DE DATOS, PERO NO DE FORMA PERMANENTE*/
Route::get("/softdelete", function (){
	App\Articulo::find(4)->delete();//Borrar ere registro
});

/*Borrar permanente un archivo de la papelera*/
Route::get("/hardDelete", function (){
	$articulos = App\Articulo::withTrashed()//consultar de papelera y los todos los datos
	                ->where('id', 4)
	                //->get();//para obtener
	                ->forceDelete();//para eliminar permanentemente los datos de papelera los datos
		
});

/*Consultar datos de dos tablas relacionadas 1 a 1*/
Route::get("/cliente/{id}/articulo", function ($id){
	
		return cliente::find($id)->articulo;//consultar en la tabla cliente con el id 1 debe mostrar el cliente y el articulo
});

//darle la vuelta a la relacion
Route::get("/articulo/{id}/cliente", function ($id){
	
		return Articulo::find($id)->cliente->nombre;//devlver el cliente a quien pertenece un articulo


});

Route::get("/articulos", function (){
	
		$articulos = cliente::find(3)->articulos->where("pais_origen","Mexico");//consultar de la bases de datos para que me muestre los articulos de un cliente

		foreach ($articulos as $articulo) {

			echo $articulo->Nombre_Articulo . "<br/>";
    //
}

		
});


/****CONSULTAR TABLAS RELACIONADAS MUCHOS A MUCHOS (revisar el modelo cliente)****/

Route::get("/cliente/{id}/perfil", function ($id)
{

	$cliente=cliente::find($id);

	foreach ($cliente->perfils as $perfil) {
				# code...
		return $perfil->nombre;//retornar el campo nombre de la tabla perfil
	}
});

/******RELACIONES POLIMORFICAS******/

Route::get("/calificaciones", function ()
{
	$articulo=Articulo::find(5);

	foreach ($articulo->calificaciones as $calificacion ) {
		# code...
		return $calificacion->calificacion;
	}
});

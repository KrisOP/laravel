<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    
 	use SoftDeletes;//Borrado suave, cuando loss datos se eliminen de la base de datos no se eliminan permanentemente. Es una papelera de reciclaje. Para habilitar esta opcion se importa con 'use'. Pero para hacerlo debemos agregar  la columna deleted_at en la base de datos. 1. Crear el archvio migration

 	protected $dates = ['deleted_at'];
	protected $fillable=[

		"profesion",
		"Nombre_Articulo",
		"Precio",
		"pais_origen",
		"observaciones",
		"seccion"
	];//Propiedad protected 'fillable'Permitir a laravel actualizar en masa.agregando los campos que agregamos en la sentencia 'create' en web.php 

	public function cliente()
	{
		return $this->belongsTo('App\cliente');//referencia al modelo cliente//consulta inversa
	}

   /*/protected $table="Articulos";//crear una variable con nombre de tabla;Vincular este modelo con el nombre de la tabla;No es necesario si creamos siempre los nombres correspondientes

	//protected $primaryKey="articulo_ID";//Esto solo si nuentra tabla no tiene una llave primaria*/
	
   public function calificaciones ()
    {
    	return $this->morphMany("App\Calificaciones", "calificacion");//utilizar las relaciones polimorfica

    }



}

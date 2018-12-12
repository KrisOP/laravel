<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    //
	public function articulo ()//para crear relacion 1 a 1
	{
		return $this->hasOne("App\Articulo");//revisar documenacion
	}

	public function articulos()
    {
        return $this->hasMany('App\Articulo');
    }

    public function perfils()
    {
        return $this->belongsToMany('App\Perfil');//apuntar al modelo Perfil
    }

    public function calificaciones ()
    {
    	return $this->morphMany("App\Calificaciones", "calificacion");
    }

    protected $fillable=["nombre","apellidos"];//para permitir insertar registros a la base de datos desde fuera en este caso desde Tinker
}

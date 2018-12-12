<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
      //
	public function inicio ()
	{
		return view ('welcome');
	}
	public function quienessomos ()
	{
		return view ('quienessomos');
	}

	public function blog ()
	{
		return view ('blog');
	}
}

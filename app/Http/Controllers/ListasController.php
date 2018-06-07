<?php

namespace App\Http\Controllers;

use app\Lista;
use app\Http\Request;
use Illuminate\Http\Request;

class ListasController extends Controller
{
    public function index()
    {
    	$listas = listas::all();
    	return view('listas.index');
    }
}

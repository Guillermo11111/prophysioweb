<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticulosController extends Controller
{
    public function index(){
        $articulos = Articulo::all();

        return $articulos;
    }
}

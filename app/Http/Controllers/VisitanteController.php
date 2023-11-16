<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    public function registro(){
        return view('registro');
    }

    public function login(){
        return view('login');
    }

    public function recuperaContraseñaVista(){
        return view('recuperar_contrasena');
    }
}

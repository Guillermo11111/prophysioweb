<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informacion;

class NosotrosController extends Controller
{
    public function index(){
        $informacion = Informacion::orderby('created_at','desc')->first();
        return view('quienes-somos',compact('informacion'));
    }

    public function userIndex(){
        $informacion = Informacion::orderby('created_at','desc')->first();
        return view('user.quienes-somos',compact('informacion'));
    }
}

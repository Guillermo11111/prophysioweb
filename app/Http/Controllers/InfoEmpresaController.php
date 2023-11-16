<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informacion;

class InfoEmpresaController extends Controller
{
    public function admin_index(){
        $informacion = Informacion::orderby('created_at','desc')->first();
        return view('admin.informacion_empresa.mostrar',compact('informacion'));
    }


    public function store(Request $request){
        $request->validate([
            'mision' => ['required','max:255', 'string', 'min:20'],
            'vision' => ['required','max:255', 'string', 'min:20'],
        ]);
        
        $especialidad = New Informacion();
        $especialidad->mision = $request->mision;
        $especialidad->vision = $request->vision;
        $especialidad->email = "prophysio@gmail.com";
        $especialidad->phone = "7712716053";

        $especialidad->save();
        return redirect(route('admin.empresa.show'))->with('info', 'Se actualizo la informacion de la empresa');;
    }
    public function delete(Request $request){
        return view('admin.informacion_empresa');
    }

    public function edit(Request $request){
        $informacion = Informacion::orderby('created_at','desc')->first();
        return view('admin.informacion_empresa.crear',compact('informacion'));
    }
}

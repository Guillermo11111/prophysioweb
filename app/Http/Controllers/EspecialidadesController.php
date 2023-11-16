<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class EspecialidadesController extends Controller
{
    public function admin_index(){
        $especialidades = Especialidad::all();
        return view('admin.especialidades.mostrar',compact('especialidades'));
    }

    public function create(){
        return view('admin.especialidades.crear');
    }

    public function store(Request $request){
        $request->validate([
            'descripcion' => ['required','max:255', 'string', 'min:10'],
            'nombre' => ['required','max:255', 'string', 'min:10'],
        ]);
        
        $especialidad = New Especialidad();
        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;

        $especialidad->save();
        return redirect(route('admin.especialidades.show'))->with('info', 'Especialidad agregada exitosamente');;
    }
    public function delete(Request $request){
        return view('admin.especialidades');
    }

    public function edit(Request $request){
        return view('admin.especialidades.modificar');
    }
}

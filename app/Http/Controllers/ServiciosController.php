<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServiciosController extends Controller
{
    public function index(){
        $servicios = Servicio::all();
        return view('servicios',compact('servicios'));
    }

    public function userIndex(){
        $servicios = Servicio::all();
        return view('user.servicios',compact('servicios'));
    }

    public function admin_index(){
        $servicios = Servicio::all();
        return view('admin.servicios.mostrar',compact('servicios'));
    }

    public function create(){
        return view('admin.servicios.crear');
    }

    public function store(Request $request){
        $request->validate([
            'descripcion' => ['required','max:255', 'string', 'min:10'],
            'nombre' => ['required','max:255', 'string', 'min:10'],
            'alternativo' => ['required','max:50', 'string', 'min:10'],
            'imagen' => ['required','mimes:jpeg,png,jpg','max:5000']
        ]);
        
        $fileName = date('Ymd-His')."-".$request->imagen->getClientOriginalName();
        $request->imagen->move(public_path("servicios_imagenes"),$fileName);
        
        $servicio = New Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->imagen = $fileName;
        $servicio->descripcion = $request->descripcion;
        $servicio->alt = $request->alternativo;

        $servicio->save();
        return redirect(route('admin.servicios.show'))->with('info', 'Se a agregado exitosamente');
    }
    public function delete(Request $request){
        return view('admin.servicios');
    }

    public function edit(Request $request){
        return view('admin.servicios.modificar');
    }


    public function errorFuncion($codigo){
        abort($codigo);
    }

    public function getServicios(){
        $servicios = Servicio::all();
        return $servicios;
    }
}
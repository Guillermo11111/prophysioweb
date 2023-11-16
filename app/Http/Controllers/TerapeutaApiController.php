<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Terapeuta;

class TerapeutaApiController extends Controller
{
    public function index(Request $request){
        $terapueta = Terapeuta::where('user_id',$request->id)->first();
        if($terapueta==null){
            return array();
        }
            
        $citasDia = Cita::select('citas.fecha_inicio','citas.folio', 'users.name', 'terapeutas.nombres', 'tipo_terapia.nombre')
                    ->join('terapeutas','citas.terapeuta_id','=','terapeutas.id')
                    ->join('tipo_terapia','citas.tipo_terapia_id','=','tipo_terapia.id')
                    ->join('users','citas.user_id','=','users.id')            
                    ->where('terapeuta_id', $terapueta->id)
                    ->where('estado_cita_id','1')
                    ->whereDate('fecha_inicio', $request->dia)
                    ->get();
        return $citasDia;
    }
}

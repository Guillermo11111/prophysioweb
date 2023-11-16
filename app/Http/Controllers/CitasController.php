<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Illuminate\Support\Carbon;

class CitasController extends Controller
{
    public function consulta(Request $request){

        $cita = Cita::select('citas.fecha_inicio','citas.estado_cita_id', 'users.name', 'terapeutas.nombres', 'terapeutas.a_paterno', 'terapeutas.a_materno', 'tipo_terapia.nombre')
        ->join('terapeutas','citas.terapeuta_id','=','terapeutas.id')
        ->join('tipo_terapia','citas.tipo_terapia_id','=','tipo_terapia.id')
        ->join('users','citas.user_id','=','users.id')
        ->where('citas.folio', $request->folio)
        ->first();

        if($cita==null){
            return $cita;
        }
        
        $date =array(
            "nombre" =>$cita->name,
            "estado" =>$cita->estado_cita_id,
            "fecha" => $cita->fecha_inicio,
            "tipoTerapia"=> $cita->nombre,
            "terapeuta"=> $cita->nombres.' '.$cita->a_paterno.' '.$cita->a_materno,
            "recomendaciones"=>'Llevar ropa comoda'
        );
        return $date;
    }

    public function store(Request $request){
        $fechaDisp = Cita::where('fecha_inicio',$request->fecha)
        ->where('terapeuta_id',$request->terapeuta_id)
        ->first(); 
        if($fechaDisp!=null)
            return array("response"=>"2"); //no esta disponible la nueva fecha con ese terapeuta
        try{
            $cita = new Cita();
            $cita->terapeuta_id=$request->terapeuta;
            $cita->user_id=$request->user;
            $cita->tipo_terapia_id=$request->tipo;
            $cita->fecha_inicio=$request->fecha_inicio;
            $cita->paciente=$request->nombre;

            $fechaF = \Carbon\Carbon::parse($request->fecha_inicio);
            $folio =$request->user. $fechaF->format('dmYH');
            $fechaF->addHour(1);
    
            $cita->fecha_fin=$fechaF->format('Y-m-d H:i:s');
            $cita->folio=$folio;
            $cita->save();

            return array("response"=>"1","folio"=>$folio);
        }
        catch (\Exception $e){
            //return "Ha ocurrido un error al guardar la cita: " . $e->getMessage();
            return array("response"=>"0");
        }
        
    }

    public function cancelar(Request $request){
        $cita = Cita::where('citas.folio', $request->folio)->first();
        if($cita==null){
            return array("response"=>"0"); //no se encontro la cita
        }
        else if($cita->estado_cita_id!="1"){
            return array("response"=>"1"); //la cita ya fue cancelada o atendida
        }
        else{ //se cancela la cita
            try{
                $cita->estado_cita_id = '2';
                $cita->fecha_inicio=null;
                $cita->fecha_fin=null;
                $cita->save();

                return array("response"=>"2");
            }
            catch (\Exception $e){
                //return "Ha ocurrido un error al cancelar la cita: " . $e->getMessage();
                return array("response"=>"3");
            }
        }
    }

    public function reagendar(Request $request) {
        $cita = Cita::where('folio',$request->folio)->first();
        if($cita==null)
            return array("response"=>"0"); //no existe esa cita
        $fechaDisp = Cita::where('fecha_inicio',$request->fecha)
                    ->where('terapeuta_id',$cita->terapeuta_id)
                    ->first(); 
        if($fechaDisp!=null)
            return array("response"=>"1"); //no esta disponible la nueva fecha con ese terapeuta
        


        try{
            $cita->fecha_inicio = $request->fecha;
            $fechaF = \Carbon\Carbon::parse($request->fecha);
            $fechaF->addHour(1);
            $cita->fecha_fin=$fechaF->format('Y-m-d H:i:s');

            $cita->save();
            return array("response"=>"3"); //si se pudo reagendar
        } 
        catch (\Exception $e){
            return array("response"=>"4"); //error inesperado
        }
    }

    public function misCitas(Request $request){
        //$citas = Cita::where('estado_cita_id','1')
        //->where('user_id',$request->user)->get();

        $citas = Cita::select('citas.fecha_inicio','citas.paciente', 'terapeutas.nombres', 'terapeutas.a_paterno', 'terapeutas.a_materno', 'tipo_terapia.nombre','citas.folio')
        ->join('terapeutas','citas.terapeuta_id','=','terapeutas.id')
        ->join('tipo_terapia','citas.tipo_terapia_id','=','tipo_terapia.id')
        ->where('citas.user_id',$request->user)
        ->where('citas.estado_cita_id','1')
        ->orderBy('citas.fecha_inicio', 'ASC') // Ordena por fecha_inicio de manera ascendente (la más próxima primero)
        ->get();

        return $citas;
    }
}

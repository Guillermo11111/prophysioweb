<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\User;
use App\Models\TipoTerapia;
use App\Models\Terapeuta;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function getTerapias(){
        $tipos = TipoTerapia::all();
        return $tipos;
    }

    public function getTerapeutas(){
        $terapeutas = Terapeuta::all();
        return $terapeutas;
    }
    
    public function index(){
        $tipos = TipoTerapia::all();
        $terapeutas = Terapeuta::all();
        
        return view('agenda',compact(['tipos','terapeutas']));
    }


    public function folio(){
        return view('user.folio');
    }
    
    public function userIndex2(){
        $citas = Cita::all();

        $events = [];

        foreach ($citas as $event) {
            $events[] = [
                'title' => $event->id,
                'start' => $event->fecha_inicio,
                'end' => $event->fecha_fin,

            ];
        }

        return view('user.agenda',compact('events'));
    }

    public function userIndex(){
        $tipos = TipoTerapia::all();
        $terapeutas = Terapeuta::all();

        return view('user.agenda',compact(['tipos','terapeutas']));
    }

    public function obtenerAgenda(Request $request){
        $citas = Cita::where('terapeuta_id',$request->terapeuta)
            ->where('estado_cita_id','1')
            ->get();

        $events = [];

        foreach ($citas as $event) {
            $events[] = [
                'title' => 'No disponible',
                'start' => $event->fecha_inicio,
                'end' => $event->fecha_fin,

            ];
        }

        return $events;
    }

    public function store(Request $request){
        $user=User::where('email',$request->correo)->first();
        $cita = new Cita();
        $cita->terapeuta_id = $request->terapeuta;
        $cita->tipo_terapia_id = $request->tipo;
        $cita->paciente=$request->nombre;
        $cita->fecha_inicio = $request->dia.' '.$request->hora.':00';
    
        $fechaF = \Carbon\Carbon::parse($request->dia.$request->hora.':00');
        $folio =$user->id. $fechaF->format('dmYH');
        $fechaF->addHour(1);

        $cita->fecha_fin=$fechaF->format('Y-m-d H:i:s');
        $cita->folio=$folio;
        $cita->user_id=$user->id;
        $cita->save();

        return redirect(route('user.agendar.folio'))->with('info', $folio);
    }

    public function obtenerHoras2(Request $request){
        // Convierte la fecha a un objeto Carbon para trabajar con ella
        $fecha = \Carbon\Carbon::parse($request->fecha);

        // Crea un arreglo con todas las horas entre 10am y 8pm
        $horas_disponibles = [];
        $hora_actual = $fecha->copy()->setHour(10)->setMinute(0)->setSecond(0);

        while ($hora_actual->hour < 20) {
            $horas_disponibles[] = $hora_actual->format('H:i:s');
            $hora_actual->addHour();
        }

        // Consulta la base de datos para obtener las horas ocupadas en la fecha dada
        $horas_ocupadas = Cita::whereDate('fecha_inicio', $fecha->toDateString())
            ->pluck('fecha_inicio')->all();

        // Convierte las horas ocupadas en un formato "H:i:s"
        $horas_ocupadas = array_map(function ($hora) {
            return \Carbon\Carbon::parse($hora)->format('H:i:s');
        }, $horas_ocupadas);
        // Filtra las horas ocupadas del arreglo de horas disponibles
        $horas_disponibles = array_diff($horas_disponibles, $horas_ocupadas);

        return $horas_disponibles;
    }

    public function obtenerHoras(Request $request){
        // Convierte la fecha a un objeto Carbon para trabajar con ella
        $fecha = \Carbon\Carbon::parse($request->fecha);

        //obtener la hora actual
        $hora_actual_real = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        
        // Crea un arreglo con todas las horas entre 10am y 8pm
        $horas_disponibles = [];
        $hora_actual = $fecha->copy()->setHour(10)->setMinute(0)->setSecond(0);
        
        while ($hora_actual->hour < 20) {
            $hora_disponible = $hora_actual->format('H:i:s');
            
            if ($hora_actual > $hora_actual_real && !Cita::where('terapeuta_id',$request->terapeuta)->where('fecha_inicio', $hora_actual->format('Y-m-d H:i:s'))->exists()) {

                $horas_disponibles[] = $hora_disponible;
            }
            $hora_actual->addHour();
        }

        return $horas_disponibles;
    }
}

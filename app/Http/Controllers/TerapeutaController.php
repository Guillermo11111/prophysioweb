<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cita;
use App\Models\Terapeuta;
use Illuminate\Support\Facades\Auth;

class TerapeutaController extends Controller
{
    public function index(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();
        return view('terapeuta.dashboard',compact('terapeuta'));
    }

    public function agenda(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();

        $citas = Cita::where('terapeuta_id',$terapeuta->id)->get();
        $citas = Cita::select('citas.fecha_inicio','citas.fecha_fin','tipo_terapia.nombre')
        ->join('tipo_terapia','citas.tipo_terapia_id','=','tipo_terapia.id')
        ->where('citas.terapeuta_id', $terapeuta->id)
        ->where('citas.estado_cita_id','1')
        ->get();

        $events = [];

        foreach ($citas as $event) {
            $events[] = [
                'title' => 'Fisioterapia '.$event->nombre,
                'start' => $event->fecha_inicio,
                'end' => $event->fecha_fin,

            ];
        }

        return view('terapeuta.agenda',compact(['terapeuta','events']));
    }

    public function buscar(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();
        return view('terapeuta.buscar',compact('terapeuta'));
    }

    public function cuenta(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();
        return view('terapeuta.cuenta',compact('terapeuta'));
    }

    public function configurar(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();
        return view('terapeuta.alexaConfiguracion',compact('terapeuta'));
    }

    public function generarToken(){
        $user = User::where('email', Auth::user()->email)->first();
        // Generar número de 8 dígitos aleatorios
        $numero = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);

        $user->tokenAlexa = $numero;
        $user->save();
        return redirect(route('terapeuta.configurar.alexa'));
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}

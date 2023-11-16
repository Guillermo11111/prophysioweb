<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PregSecreta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class PreguntaSecretaController extends Controller
{
    public function index(){
        if(Auth::user()->respuesta!=null){
            return redirect(route('user.inicio'));
        }
        $preguntas = PregSecreta::all();
        return view('auth.configurar-pregunta',compact('preguntas'));
    }

    public function preg_secreta(Request $request){
        $request->validate([
            'pregunta' => ['required'],
            'respuesta' => ['required', 'string'],
        ]);

        $usuario = User::where('email',Auth::user()->email)->first();

        $usuario->pregunta_id = $request->pregunta;
        $usuario->respuesta = Crypt::encryptString($request->respuesta);
        $usuario->save(); 
    
        return redirect(route('user.inicio'))->with('info', 'Se actualizo la información');
    }
}

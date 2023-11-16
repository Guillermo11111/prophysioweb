<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AlexaController extends Controller
{
    public function index(){
        return view('auth.alexaConfiguracion');
    }

    public function generarToken(){
        $user = User::where('email', Auth::user()->email)->first();
        // Generar número de 8 dígitos aleatorios
        $numero = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);

        $user->tokenAlexa = $numero;
        $user->save();
        return redirect(route('user.configurar.alexa'));
    }

    public function validarToken(Request $request){
        $usuario = User::where('tokenAlexa', $request->token)->first();

        if($usuario == null){
            $user =array(
                "id" => 0,
                "nombre" => 0,
                "permiso"=> 0,
                "correo"=> 0
            );
        }
        else if($usuario->es_terapeuta == 1){
            $user =array(
                "id" => $usuario->id,
                "nombre" => $usuario->name,
                "permiso"=> '2',
                "correo"=> $usuario->email
            );
        }
        else{
            $user =array(
                "id" => $usuario->id,
                "nombre" => $usuario->name,
                "permiso"=> '1',
                "correo"=> $usuario->email
            );
        }

        return $user;
    }
}

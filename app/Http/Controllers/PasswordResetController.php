<?php

namespace App\Http\Controllers;

use App\Models\PregSecreta;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PasswordResetController extends Controller
{
    public function mostrarOpciones(){
        return view('auth.opciones-recuperacion');
    }

    public function mostrarPregunta(){
        return view('auth.ingresa-correo');
    }

    public function validarCorreo(Request $request){
        $user = User::where('email', $request->correo)->first();

        $request->validate([
            'correo' => ['required', 'email'],
        ]);

        if($user == null){
            return redirect(route('password.secret'))->with('info','El correo ingresado no esta registrado');
        }

        return redirect(route('password.pregunta',Crypt::encryptString($user->email)));
    }

    public function preguntar($correo){
        try {
            $email = Crypt::decryptString($correo);
        } catch (DecryptException $e) {
            return redirect(route('password.secret'))->with('info','El correo ingresado no esta registrado');
        }
        
        if(User::where('users.email',$email)->first()->respuesta == null){
            return redirect(route('password.secret'))->with('info','Esta cuenta no tiene configurada la pregunta secreta, prueba con otro metodo de recuperacion');
        }

        $user = User::select('users.email','users.name','pregunta_secreta.pregunta')
        ->join('pregunta_secreta','users.pregunta_id','=','pregunta_secreta.id')
        ->where('users.email',$email)
        ->first();

        if($user == null){
            return redirect(route('password.secret'))->with('info','El correo ingresado no esta registrado');
        }
        
        
        return view('auth.ingresar_pregunta',compact('user'));
    }

    public function validarRespuesta(Request $request){
        $user = User::where('email', $request->correo)->first();

        $request->validate([
            'correo' => ['required', 'email'],
            'respuesta' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        
        try {
            $respuestaCorrecta = Crypt::decryptString($user->respuesta);
        } catch (DecryptException $e) {
            return redirect(route('password.pregunta',Crypt::encryptString($user->email)))->with('info','La respuesta es incorrecta');
        }


        if($respuestaCorrecta != $request->respuesta){
            return redirect(route('password.pregunta',Crypt::encryptString($user->email)))->with('info','La respuesta es incorrecta');
        }

        $user->contrasena=$request->password;
        $user->password=Hash::make($request->password);  
        $user->save();
        return redirect(route('login.visit'))->with('status','Se ha actualizado su contraseña');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }

    public function inicio()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request){
        $user = User::where('email', $request->correo)->get();

        $request->validate([
            'correo' => ['required', 'email'],
            'contrasena' => ['required', 'string'],
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha],
        ]);
 
        if($request->tipo =="1"){
            $credentials = [
                "email" => $request->correo,
                "password" => $request->contrasena,
                "active" => 1,
                "es_admin" => 1
            ];
        }
        else{
            $credentials = [
                "email" => $request->correo,
                "password" => $request->contrasena,
                "active" => 1,
                "es_terapeuta" => 1
            ];
        }

        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if($request->tipo=="1")
                return redirect(route('admin.dashboard'));
            else
                return redirect(route('terapeuta.dashboard'));
        }

        if(count($user) >0){ 
            if($user[0]->active == 0){
                throw validationException::withMessages([
                    'correo' => __('auth.active')
                ]);
            }     
            elseif($request->tipo=="1" && $user[0]->es_admin == 0 ){
                throw validationException::withMessages([
                    'tipo' => __('auth.permission')
                ]);
            }  
            elseif($request->tipo=="2" && $user[0]->es_terapeuta == 0 ){
                throw validationException::withMessages([
                    'tipo' => __('auth.permission')
                ]);
            }  
            throw validationException::withMessages([
                'contrasena' => __('auth.password')
            ]);
            
        }
        else{
            throw validationException::withMessages([
                'correo' => __('auth.failed'),
            ]);
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Pregunta;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto');
    }

    public function index_user(){
        return view('user.contacto');
    }

    public function enviarCorreoContacto(Request $request){

        $request->validate([
            'nombre' => ['required','string','min:5'],
            'correo' => ['required', 'email','string'],
            'telefono' => ['required','string', 'max:10'],
            'mensaje' => ['required', 'string','max:255'],
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('yahirgamerpvz@gmail.com')->send( $correo);
        
        return redirect(route('contacto.formulario'))->with('info', 'Correo enviado exitosamente');
    }

    public function enviarCorreoContacto_user(Request $request){

        $request->validate([
            'nombre' => ['required','string','min:5'],
            'correo' => ['required', 'email','string'],
            'telefono' => ['required','string', 'max:10'],
            'mensaje' => ['required', 'string','max:255'],
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('yahirgamerpvz@gmail.com')->send( $correo);
        
        return redirect(route('user.contacto.formulario'))->with('info', 'Correo enviado exitosamente');
    }

    public function pre_fre(){
        $preguntas = Pregunta::all();
        return view('preguntas_frecuentes', compact('preguntas'));
    }

    public function ter_cond(){
        return view('terminos_condiciones');
    }

    public function politica(){
        return view('politica_privacidad');
    }

    public function pre_fre_user(){
        $preguntas = Pregunta::all();
        return view('user.preguntas_frecuentes', compact('preguntas'));
    }

    public function ter_cond_user(){
        return view('user.terminos_condiciones');
    }

    public function politica_user(){
        return view('user.politica_privacidad');
    }

    public function getPreguntasFrecuentes(){
        $preguntas = Pregunta::all();
        return $preguntas;
    }

    public function enviarCorreoContactoApi(Request $request){

        $request->validate([
            'nombre' => ['required','string','min:5'],
            'correo' => ['required', 'email','string'],
            'telefono' => ['required','string', 'max:10'],
            'mensaje' => ['required', 'string','max:255'],
        ]);

        try{
            $correo = new ContactanosMailable($request->all());
            Mail::to('yahirgamerpvz@gmail.com')->send( $correo);

            return array("response"=>"1");
        }
        catch (\Exception $e){
            return array("response"=>"0");
        }
        

        
       
    }
}

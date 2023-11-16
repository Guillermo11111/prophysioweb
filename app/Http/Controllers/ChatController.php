<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    public function preguntaChat(Request $request){
        #$pregunta = Chat::all();

        $respuesta = Chat::where('pregunta', 'Like', '%'.$request->pregunta.'%')->first();
        if ($respuesta == null){
            return 'Lo siento, no encontre respuesta a lo que me preguntaste';
        }
        return $respuesta->respuesta;   
    }

    
}

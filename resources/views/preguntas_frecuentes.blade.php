@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Preguntas frecuentes')

@section('content')

    <div class="container section">
        {{ Breadcrumbs::render('preguntas_frecuentes') }}
        <center><h3>Preguntas Frecuentes</h3></center>
        @foreach ($preguntas as $pregunta)
        <div class="row">
            <div class="col s12">
                <button class="waves-effect waves-light btn" onclick="ocultarPregunta( '{{$pregunta->id}}' )" style="width: 100%; font-size: 15px">{{$pregunta->pregunta}}</button>
            </div>
            <div id="{{$pregunta->id}}" style="display: none;" class="col s12">
                <p class="pregunta">{{$pregunta->respuesta}}</p>
            </div>
        </div>
        @endforeach

    </div>

    <style>
        .pregunta{
            font-size: 23px; 
            padding: 10px;
            border: solid 1px #000;
            background-color: #C7F7F7;
        }
    </style>

    <script>
        function ocultarPregunta(numeroP){
            let pregunta = document.getElementById(numeroP);
            if (pregunta.style.display === "none") {
                pregunta.style.display = "block";
            } else {
                pregunta.style.display = "none";
            }
        }
    </script>

    @endsection
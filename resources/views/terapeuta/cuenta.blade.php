@extends('terapeuta.plantilla_terapeuta')

@section('meta')

@endsection

@section('title', 'Mi cuenta')

@section('foto', asset('terapeutas/'.$terapeuta->foto))

@section('name', $terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno)

@section('content')
    <center><h3>Hola {{$terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno}}</h3></center>


    <div class=" container">
        <div class="row section">
            <div class="col s12">
                <a class="btn" href="{{route('terapeuta.configurar.alexa')}}">
                    Token para aplicacion de Alexa
                </a>
            </div>

        </div>
        <div class="row section">
            <center><a href="{{route('terapeuta.logout')}}" class="btn">
                Cerrar sesion
            </a></center> 
        </div>
    </div>
@endsection

@section('scripts_styles')

@endsection
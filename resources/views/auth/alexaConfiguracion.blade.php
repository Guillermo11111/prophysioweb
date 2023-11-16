@extends('user.plantilla_user')

@section('title', 'Alexa')

@section('content')
<br><br><br>
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12">
                <strong>Aplicacion de Alexa</strong>
            </div>
            <div class="col s12">
                <p>Atravez de tu dispositivo de alexa, puedes consultar,agendar,reprogramar y cancelar tus citas.</p>
            </div>
            @if(Auth::user()->tokenAlexa == null) 
                <form action="{{ URL::secure('inicio/alexa-generar') }}" method="POST" class="col s12">
                    @csrf
                    <button type="submit" class="btn">
                    Generar Token
                    </button>
                </form>
            @else
                <div class="col s12">
                    <p>Este es tu token para la aplicacion de Alexa, no lo compartas con nadie</p>
                    <p><b>{{Auth::user()->tokenAlexa}}</b></p>
                </div>
            @endif
        </div>
    </div>
@endsection
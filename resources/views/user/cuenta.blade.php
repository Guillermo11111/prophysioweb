@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Mi cuenta')

@section('content')
    <center><h3>Hola @auth {{Auth::user()->name}} @endauth</h3></center>


    <div class=" container">
        <div class="row section">
            <div class="col s12">
                <a class="btn" href="{{route('configurar.show2faForm')}}">
                    Autenticacion de Doble factor
                </a>
            </div>
            <br><br><br>
            <div class="col s12">
                <a class="btn" href="{{route('user.configurar.alexa')}}">
                    Token para aplicacion de Alexa
                </a>
            </div>

        </div>
        <div class="row section">
            <form method="POST" class="col s12" action="{{ URL::secure('logout') }}">
                @csrf
                <center><button type="submit" class="btn">
                    Cerrar sesion
                </button></center> 
            </form>
        </div>
    </div>



@endsection

@section('scripts_styles')

@endsection

@extends('plantilla_visit')

@section('title', 'Recuperar Contraseña')

@section('content')
    
    <br><br><br>
    <div class=" container">
    
        <div class="row section">
        
            <div class="col m2 l3 s0"></div>
            
            <div class="col l6 m8 s12">
                <div class="row card-panel">

                    <center><b>Recuperar Contraseña</b></center>

                    <p> {{$user->name}} hemos enviado tu contraseña a tu correo electronico</p>

                    <center><a class="btn" href="{{ route('login.visit') }}">Aceptar </a></center>

                    <br>

                </div>
            </div>
                
            <div class="col l3 m2 s0"></div>

        </div>

    </div>
    <br><br><br>


    @endsection
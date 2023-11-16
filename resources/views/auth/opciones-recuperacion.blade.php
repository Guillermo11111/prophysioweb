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

                    <p>
                        Eliga un metodo para recuperar contraseña
                    </p>

                    <div class="col s12">
                        <p>1. Recuperar contraseña por correo electronico</p>
                        <center><a class="btn"  href="{{route('password.request')}}"> Aceptar </a></center>
                    </div>
                    

                    <div class="col s12">
                        <p>2. Recuperar contraseña por pregunta secreta</p>
                        <center><a class="btn"  href="{{route('password.secret')}}"> Aceptar </a></center>
                    </div>

                    <br>

                </div>
            </div>
        </div>
    </div>
    <br>


    @endsection
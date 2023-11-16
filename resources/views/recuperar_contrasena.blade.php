@extends('plantilla_visit')

@section('title', 'Recuperar Contraseña')

@section('content')
    
    <br><br><br>
    <div class=" container">
    
        <div class="row section">
        
            <div class="col m2 l3 s0"></div>
            
            <form action="{{ route('user.recuperarContraseña') }}" method="POST" class="col l6 m8 s12">
            @csrf 
                <div class="row card-panel">

                    <center><b>Recuperar Contraseña</b></center>

                    <p>Para recuperar su contraseña Ingrese su correo electronico con el cual esta registrado</p>
                    <div class="input-field col s12">
                        <input id="correo" name="correo" type="email" value="{{ old('correo') }}" requiered autofocus class="validate" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un formato de correo electronico valido">
                        <label for="correo">Correo electronico:</label>
                        <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                        <strong style="color: red;">@if (session('info')) {{session('info')}} @endif</strong>

                    </div>

                    <center><input class="btn" type="submit" value="Aceptar"> </input></center>

                    <br>

                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>


    @endsection
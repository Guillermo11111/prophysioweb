@extends('plantilla_visit')

@section('title', 'Recuperar Contraseña')

@section('content')
    
<br><br><br>
    <div class=" container">
    
        <div class="row section">
        
            <div class="col m2 l3 s0"></div>
            
            <form action="{{route('password.respuesta.validate')}}" method="POST" class="col l6 m8 s12">
            @csrf 
                <div class="row card-panel">

                    <center><b>Recuperar Contraseña</b></center>

                   <center><p> {{$user->name}} Para recuperar tu contraseña contesta la siguiente pregunta:</p></center>
                    <p><b>{{$user->pregunta}}</b></p>
                    <div class="input-field col s12">
                        <input id="respuesta" name="respuesta" type="text" value="" required class="validate" >
                        <label for="respuesta">Respuesta:</label>
                        <strong style="color: red;">@error('respuesta') {{ $message }} @enderror</strong> 
                        <strong style="color: red;">@if (session('info')) {{session('info')}} @endif</strong>
                    </div>

                    <div class="input-field col s12">
                        <input id="correo" name="correo" type="hidden" value="{{$user->email}}" required class="validate" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un formato de correo electronico valido">
                        <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                    </div>

                    <center><b>Ingresa tu nueva Contraseña</b></center>
                    <div class="input-field col s11">
                        <input id="password" name="password" value="{{ old('password') }}" type="password" class="validate" required
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%()*?&#.$($)$-$_]){8,}$" title="La contraseña debe contener al menos una letra mayuscula, 
                            una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres">
                        <label for="password">Contraseña:</label>
                        <strong style="color: red;">@error('password') {{ $message }} @enderror</strong> 
                    </div>
                    <div class="col s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>

                    <div class="input-field col s11">
                        <input id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" type="password" class="validate" required
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%()*?&#.$($)$-$_]){8,}$" title="La contraseña debe contener al menos una letra mayuscula, 
                            una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres">
                        <label for="password_confirmation">Confirmar contraseña:</label>
                        <strong style="color: red;">@error('password_confirmation') {{ $message }} @enderror</strong> 
                    </div>
                    <div class="col s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena2()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>

                    <center><input class="btn" type="submit" value="Aceptar"> </input></center>

                    <br>

                </div>

                

            </form>
        </div>

    </div>
    
    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
        function mostrarContrasena2(){
            var tipo = document.getElementById("password_confirmation");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>


    @endsection
@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Login')

@section('content')
    <div class=" container">


        <div class="row section">
        {{ Breadcrumbs::render('login') }}
            <div class="col m2 l3 s0"></div>
            <form action="{{ URL::secure('inicia-sesion') }}" method="POST" class="col l6 m8 s12">
            @csrf 
                <div class="row card-panel">

                    @if (session('status'))
                        <div class="col s12">
                            <p class="green-text">{{ session("status")}}</p> 
                        </div>
                    @endif
                    <center><b>Iniciar sesion</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="correo" name="correo" type="email" value="{{ old('correo') }}" requiered autofocus class="validate" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un formato de correo electronico valido">
                        <label for="correo">Correo electronico:</label>
                        <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 

                    </div>

                    <div class="input-field col s11">
                        <input id="contrasena" name="contrasena" value="{{ old('contrasena') }}" required type="password" class="validate" >
                        <label for="contrasena">Contraseña:</label>
                    </div>
                    <div class="col s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>
                    <div class="col s12"><strong style="color: red;">@error('contrasena') {{ $message }} @enderror</strong> </div>

                    <div class="col s12">
                        <label for="remember_me">
                        <input id="remember_me" name="remember" type="checkbox" class="filled-in">
                            <span>Mantener sesion iniciada</span> 
                        </label>
                    </div>

                    <br>
                    <div class="col s12">
                        <center> ¿Se te olvido tu contraseña?  <a class="" href="{{ route('password.request') }}">Recuperar contraseña </a></center><br>
                    </div>
                    <center><input class="btn" type="submit" value="Iniciar sesion"> </input></center>

                    <br>

                    <center> ¿No tienes una cuenta?  <a class="" href="{{ route('register.visit') }}">Registrarse aqui</a></center>

                </div>
            </form>
        </div>

    </div>
    <br><br><br>

    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("contrasena");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
            
        }
    </script>
    @endsection
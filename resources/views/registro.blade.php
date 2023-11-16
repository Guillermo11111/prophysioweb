@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Registrarse')

@section('content')

    
    <div class="section container">

        <div class="row">
        {{ Breadcrumbs::render('registro') }}
            <form action="{{ URL::secure('validar-registro') }}" method="POST" class="col s12">

            @csrf 
                <div class="row card-panel">

                    <center><b>Registrarse</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required
                            title="El nombre debe tener al menos una longitud de 4 letras">
                        <label for="nombre">Nombre:</label>
                        <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" type="email" value="{{ old('correo') }}" class="validate" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                        <label for="correo">Correo electronico:</label>
                        <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" class="validate" required
                        pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos">
                        <label for="telefono">Telefono:</label>
                        <strong style="color: red;">@error('telefono') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m5 l5 s11">
                        <input id="password" name="password" value="" type="password" class="validate" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+-=,./<>?;':\[\]{}|`~])\S{8,}" title="La contraseña debe contener al menos una letra mayuscula, 
                            una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres">
                        <label for="password">Contraseña:</label>
                        <strong style="color: red;">@error('password') {{ $message }} @enderror</strong> 
                    </div>
                    <div class="col m1 l1 s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>

                    <div class="input-field col m5 l5 s11">
                        <input id="password_confirmation" name="password_confirmation" value="" type="password" class="validate" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+-=,./<>?;':\[\]{}|`~])\S{8,}" title="La contraseña debe contener al menos una letra mayuscula, 
                            una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres">
                        <label for="password_confirmation">Repetir contraseña:</label>
                        <strong style="color: red;">@error('password_confirmation') {{ $message }} @enderror</strong> 
                    </div>
                    <div class="col m1 l1 s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena2()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>

                    
                    <div class="col s12">
                        <label for="politica">
                            <input id="politica" name="politica" type="checkbox" class="filled-in validate" required
                            title="Acepta las politicas de privacidad para continuar">
                            <span><b>He leido y acepto la <a href="{{ route('politica.privacidad') }}">politica de privacidad</a></b></span>
                        </label>
                    </div> 

                    <div class="col s12">
                        <center><button class="btn waves-effect waves-light" type="submit" value="">Registrarse
                            <i class="material-icons left">
                                person_add
                            </i>
                        </button></center>
                    </div>
                    
                    <div class="col s12">
                        <br>
                        <center>¿Ya tienes una cuenta? <a class="" href="{{ route('login.visit') }}">Inicia sesion aqui</a></center>
                    </div>


                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>

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
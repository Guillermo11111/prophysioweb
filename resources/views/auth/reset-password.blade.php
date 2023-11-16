<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">
    <title>Recuperar contraseña</title>
</head>
<body>
    <br><br><br>
    <div class="section container">

        <div class="row">
            <div class="col s0 m2 l3"></div>
            <form action="{{ route('password.store') }}" method="POST" class="col s12 m8 l6">
            @csrf 
                <div class="row card-panel">
                    <center><b>Nueva contraseña</b></center> 
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" class="validate" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                        <label for="email">Correo electronico:</label>
                        <strong style="color: red;">@error('email') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s11">
                        <input id="password" name="password" value="" type="password" class="validate" required
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%()*?&#.$($)$-$_]){8,}$" title="La contraseña debe contener al menos una letra mayuscula, 
                            una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres">
                        <label for="password">Contraseña:</label>
                        <strong style="color: red;">@error('password') {{ $message }} @enderror</strong> 
                    </div>
                    <div class="col s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>

                    <div class="input-field col s11">
                        <input id="password_confirmation" name="password_confirmation" value="" type="password" class="validate" required
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%()*?&#.$($)$-$_]){8,}$" title="La contraseña debe contener al menos una letra mayuscula, 
                            una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres">
                        <label for="password_confirmation">Confirmar contraseña:</label>
                        <strong style="color: red;">@error('password_confirmation') {{ $message }} @enderror</strong> 
                    </div>
                    <div class="col s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena2()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>


                    <div class="col s12">
                        <center><button class="btn waves-effect waves-light" type="submit" value="">Restablecer contraseña
                        </button></center>
                    </div>
                    

                </div>
            </form>
        </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>

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
</body>
</html>


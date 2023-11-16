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
    <title>Recuperacion de contraseña</title>
</head>
<body>
    <br><br><br>
    <div class="container section">
        <div class="row ">
            <div class="col s0 m3"></div>
            <div class="col m6 s12">
                <div class="row card-panel">
                    <div class="col s12">
                        <p>¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.</p>
                    </div>
                    @if (session('status'))
                        <div class="col s12">
                            <strong class="green-text">¡Le hemos enviado un correo electrónico con su enlace de restablecimiento de contraseña!</strong> 
                        </div>
                    @endif
                    <div class="col s12">
                        <center>
                            <form method="POST" class="row" action="{{ URL::secure('forgot-password-email') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="input-field col s12">
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" requiered autofocus class="validate" 
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un formato de correo electronico valido">
                                    <label for="email">Correo electronico:</label>
                                    <strong style="color: red;">@error('email') {{ $message }} @enderror</strong> 
                                </div>

                                <div class="">
                                    <center><button class="btn" type="submit">Enviar enlace de restablecimiento de contraseña por correo electrónico</button>
                                    </center>
                                </div>
                            </form>

                        </center>
                    </div>
                </div>
                
            </div>
            <div class="col s0 m3"></div>
        </div>
    </div>





    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>
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
    <title>Verificacion de correo</title>
</head>
<body>
    <br><br><br>
    <div class="container section">
        <div class="row">
            <div class="col s0 m3"></div>
            <div class="col m6 s12">
                <div class="card-panel row">
                    <div class="col s12">
                        <p>Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.</p>
                    </div>
                    @if (session('status') == 'verification-link-sent')
                        <div class="col s12">
                            <p>Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.</p> 
                        </div>
                    @endif
                    <div class="col s12">
                        <center>
                        <div class="col s12">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button class="btn" type="submit">
                                        Reenviar correo de verificacion
                                    </button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('user.logout') }}">
                                @csrf

                                <br>
                                <button type="submit" class="btn">
                                    Cerrar sesion
                                </button>
                            </form>
                        </div>
                        </center>
                    </div>
                </div>
                
            </div>
            <div class="col s0 m4"></div>
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
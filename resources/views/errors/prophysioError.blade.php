<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('img/logo.jpeg') }}">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>@yield('title')</title>

    </head>


    <body>
        <div class="container section">
            <div class="row">
                <div class="col s12 ">
                    <h4 class="center-align">Error @yield('code')</h4>
                </div>

                <div class="col s12 ">
                    <h5 class="center-align">@yield('message')</h5>
                </div>

                <div class="col s12 m3 l4"></div>
                <div class="col s12 m6 l4">
                    <img class="responsive-img" alt="Imagen de un terapeuta triste" src="{{ asset('iconos/error.jpg') }}">
                </div>
                <div class="col s12 m3 l4"></div>


                <div class="col s12">
                    <br> <center><a href="{{ route('user.inicio') }}" class="btn yellow black-text">Regresar al inicio</a></center>
                </div>
                
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



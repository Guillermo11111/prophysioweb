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
    <title>Configuracion de pregunta secreta</title>
</head>
<body>
    <br><br><br>
    

<div class=" container">
    <div class="row section">
    <center><h4>Hola @auth {{Auth::user()->name}} @endauth</h4></center>
    <p><b>Antes de continuar, configura una pregunta secreta, esta te ayudara a recuperar tu contraseña en caso de que la pierdas.</b></p>

        <div class="col m2 l3 s0"></div>
        <form action="{{ route('user.pregunta.configurar') }}" method="POST" class="col l6 m8 s12">
        @csrf 
            <div class="row card-panel">

                @if (session('status'))
                    <div class="col s12">
                        <p class="red-text">{{ session("status")}}</p> 
                    </div>
                @endif
                <center><b>Configurar pregunta secreta</b></center>

                <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>

                <div class="input-field col s12">
                    <select id="pregunta" name="pregunta"> 
                        @foreach ($preguntas as $pregunta)
                            <option value="{{$pregunta->id}}">{{$pregunta->pregunta}}</option>
                        @endforeach
                    </select>
                    <label>Elige una Pregunta:</label>
                </div>
                
                <div class="input-field col s12">
                    <input id="respuesta" name="respuesta" type="text" value="{{ old('respuesta') }}" requiered autofocus class="validate">
                    <label for="respuesta">Respuesta:</label>
                    <strong style="color: red;">@error('respuesta') {{ $message }} @enderror</strong> 

                </div>

                <div class="col s12">
                    <center><button class="btn" type="submit"> Aceptar</button></center>
                </div>

            </div>
        </form>


    </div>
    <div class="row section">
        <form method="POST" class="col s12" action="{{ route('user.logout') }}">
            @csrf
            <center><button type="submit" class="btn">
                Cerrar sesion
            </button></center> 
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
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Iniciar sesion</title>

</head>

<body>
    <div class="navbar-fixed">
        <nav style="background-color: #C7F7F7;" >
            <div class="nav-wrapper">
                <a href="{{route('admin.login')}}" class="brand-logo center black-text">Prophysio</a>
            </div>
        </nav>
    </div>

    <br><br><br>
    <div class="section container">
        <div class="row">

            <div class="col m2 l3 s0"></div>
            <form action="{{route('admin.login.form')}}" method="POST" class="col l6 m8 s12">

            @csrf
                <div class="row card-panel">
                    <center><b>Iniciar sesion</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="correo" name="correo" value="{{ old('correo') }}" type="text" class="validate" autofocus required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un formato de correo electronico valido">
                        <label for="correo">Correo:</label>
                        <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12 ">
                        <select name="tipo"> 
                            <option value="1" selected>Administrador</option>
                            <option value="2">Terapeuta</option>
                        </select>
                        <label>Tipo de usuario</label>
                        <strong style="color: red;">@error('tipo') {{ $message }} @enderror</strong> 
                    </div>


                    <div class="input-field col s11">
                        <input id="contrasena" name="contrasena" value="{{ old('contrasena') }}" required type="password" class="validate" >
                        <label for="contrasena">Contraseña:</label>
                    </div>
                    <div class="col s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>
                    <div class="col s12">
                        <strong style="color: red;">@error('contrasena') {{ $message }} @enderror</strong> 
                    </div>


                    <div class="col s12">
                        <center><button class="btn waves-effect waves-light" type="submit" value="">Iniciar sesion
                            <i class="material-icons left">
                            keyboard_tab
                            </i>
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

    <script src="https://www.google.com/recaptcha/api.js?render=6LcztLgkAAAAAAkhcLxVC0asNYzPNM6A-CGgGK5Q"></script>

    <script>
        document.addEventListener('submit', function(e){
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LcztLgkAAAAAAkhcLxVC0asNYzPNM6A-CGgGK5Q', {action: 'submit'}).then(function(token) {
                    let form = e.target;
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'g-recaptcha-response';
                    input.value = token;

                    form.appendChild(input);

                    form.submit();
                });
            });
        });
    </script>


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
</body>
</html>
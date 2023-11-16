<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @yield('meta')
    @laravelPWA
    <title>@yield('title') </title>
    
</head>

<body>
    <div class="navbar-fixed">
        <nav style="background-color: #C7F7F7;" >
            <div class="nav-wrapper">
                <a href="{{ route('user.inicio')}}" style="padding-left:30px" class="brand-logo black-text">Prophysio</a>
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down" style="padding-right:20px">
                    <li><a  href="{{ route('user.inicio') }}" @if (Request::is('inicio')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif class="">Inicio</a></li> 
                    <li>
                        <a class="" href="{{ route('user.agendar.cita') }}" @if (Request::is('inicio/agendar')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.servicios.mostrar') }}" @if (Request::is('inicio/servicios')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                            Servicios
                            <i class="material-icons left">
                                build
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('user.blog.all') }}" @if (Request::is('inicio/blog')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                            Blog
                            <i class="material-icons left">
                                forum
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('user.quienes.somos') }}" @if (Request::is('inicio/quienes-somos')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                            Nosotros
                            <i class="material-icons left">
                                people_outline
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('user.contacto.formulario') }}" @if (Request::is('inicio/contacto')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                            Contacto
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesiones" @if ((Request::is('inicio/cuenta')) || (Request::is('inicio/cuenta/*'))) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000;" @endif >
                        @auth {{Auth::user()->name}} @endauth
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <ul id="id_sesiones" class="dropdown-content">
        <li>
            <a class="black-text" href="{{ route('user.cuenta.show') }}">
                Cuenta
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="{{ route('user.cerrar.sesion') }}">
                Salir
                <i class="material-icons left">
                    logout
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_sesionResp" class="dropdown-content">
        <li>
            <a class="black-text" href="{{ route('user.cuenta.show') }}">
                Cuenta
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="{{ route('user.cerrar.sesion') }}">
                Salir
                <i class="material-icons left">
                    logout
                </i>
            </a>
        </li>
    </ul>

    <ul class="sidenav" style="background-color: #FFFFFF"  id="menu-responsive">
        <li><a  href="{{ route('user.inicio') }}" @if (Request::is('inicio')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif class="">Inicio</a></li> 
        <li>
            <a class="" href="{{ route('user.agendar.cita') }}" @if (Request::is('inicio/agendar')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                Agendar
                <i class="material-icons left">
                    today
                </i>
            </a>
        </li>
        <li>
            <a href="{{ route('user.servicios.mostrar') }}" @if (Request::is('inicio/servicios')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                Servicios
                <i class="material-icons left">
                    build
                </i>
            </a>
        </li>
        <li>
            <a class="" href="{{ route('user.blog.all') }}" @if (Request::is('inicio/blog')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                Blog
                <i class="material-icons left">
                    forum
                </i>
            </a>
        </li>
        <li>
            <a class="" href="{{ route('user.quienes.somos') }}" @if (Request::is('inicio/quienes-somos')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                Nosotros
                <i class="material-icons left">
                    people_outline
                </i>
            </a>
        </li>
        <li>
            <a class="" href="{{ route('user.contacto.formulario') }}" @if (Request::is('inicio/contacto')) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000000;" @endif>
                Contacto
                <i class="material-icons left">
                    chat
                </i>
            </a>
        </li>
        <li>
            <a class="dropdown-trigger" href="#" data-target="id_sesionResp" @if ((Request::is('inicio/cuenta')) || (Request::is('inicio/cuenta/*'))) style="background-color: #E20089; color:#FFFFFF;" @else style="color:#000;" @endif >
            @auth {{Auth::user()->name}} @endauth
                <i class="material-icons left">
                    account_circle
                </i>
            </a>
        </li>
    </ul>

    @yield('content')

    <!-- chat-->
    <div class="row" id="chat" style="display: none">
        <div class="col s1 l3 m3"></div>
        <div class="col s10 l6 m6 " style="height: 500px; background: #fff; border-radius: 5px; border: 1px solid lightgrey; border-top: 0px;">
            <div class="row">
                <div class="col s12" style="border-bottom: 1px solid #006fe6; background-color: #C7F7F7; border-radius: 5px 5px 0 0; color: #000; font-size: 20px; font-weight: 500; line-height: 60px;">
                    <center>Chat de ayuda</center>
                </div>
            </div>
            <div id="form" class="row" style="padding: 15px; min-height: 400px; max-height: 400px; overflow-y: auto;">
                <div class="col s12">
                    <div class="row">
                        <div class="col s2">
                            <center><i class="material-icons left black-text" style="padding: 10px 10px; border-radius:50%; background: #C7F7F7; " >person</i> </center>
                        </div>
                        <div class="col s8" style="border-radius: 15px; background: #C7F7F7; padding: 12px 15px ; margin-left:10px;">
                            <label class="black-text" style="word-break: break-all;  font-size: 15px;"> <b> Hola, ¿En que puedo ayudarte? </b> </label>
                        </div>
                        <div class="col s1"></div>
                    </div>
                </div>

            </div>
            <div class="row" style="height: 70px; width: 100%; padding: 10px; background-color: #ccc9c9; border:solid 1px lightgrey">
                <div class="col s9 m10" style="background-color: #ccc9c9;  height: 50px; padding-top: 10px; ">
                    <input id="data" type="text" style="background-color: #fff; height:30px; width:90%; margin-right: 10%; padding-left: 10px; padding-right: 10px; border-radius: 4px" placeholder="Escribe algo..." class="validate" required>
                </div>
                <div class="col s3 m2" style="background-color: #ccc9c9; height: 50px; padding-top: 10px;">
                    <button class="btn black-text" style="height:30px; background-color: green" id="send-btn">
                        <i class="material-icons center">
                            send
                        </i> 
                    </button>
                </div>
                
            </div>
        </div>
        <div class="col s1 l3 m3"></div>
    </div>

    <div class="row">
        <div class="col s11"></div>
        <div class="col s1">
        <button class="btn-floating btn-large waves-effect waves-light" style="background-color: #C7F7F7;" onclick="ocultarChat();"><i class="material-icons black-text">chat</i></button>
        </div>
    </div>


    <!-- footer-->
    <footer class="page-footer" style="background-color: #C7F7F7;">
          <div class="container">
            <div class="row">
                <div class="col l4 m4 s12">
                    <h5 class="black-text"> Informacion</h5>
                    <ul>
                    <li><a @if (Request::is('inicio/politica-de-privacidad')) style="color:#E20089;" @else style="color:#000;" @endif  href="{{ route('user.politica.privacidad') }}"><b>Politica de privacidad</b></a></li>
                    <li><a @if (Request::is('inicio/preguntas-frecuentes')) style="color:#E20089;" @else style="color:#000;" @endif href="{{ route('user.preguntas.frecuentes') }}"><b>Preguntas frecuentes</b></a></li>
                    <li><a @if (Request::is('inicio/terminos-y-condiciones')) style="color:#E20089;" @else style="color:#000;" @endif href="{{ route('user.terminos.condiciones') }}"><b>Terminos y condiciones</b></a></li>
                    </ul>
                </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">Contacto</h5>
                <ul>
                  <li><a href="{{ route('user.contacto.formulario') }}" @if (Request::is('inicio/contacto')) style="color:#E20089;" @else style="color:#000;" @endif><b>Correo electronico</b></a></li>
                  <li><p class="black-text text-lighten-3">Ubicacion: <br> Calle Coahulia. S/N. col. Tahuizan. Huejutla Hgo </p></li>
                  <li><p class="black-text text-lighten-3" >Telefono: +52 2225081501</p></li>
                </ul>
              </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">¿Quienes somos?</h5>
                <ul>
                  <li><a @if (Request::is('inicio/quienes-somos')) style="color:#E20089;" @else style="color:#000;" @endif href="{{ route('user.quienes.somos') }}"><b>Mision y vision</b></a></li>
                  <li><a @if (Request::is('inicio/servicios')) style="color:#E20089;" @else style="color:#000;" @endif href="{{ route('user.servicios.mostrar') }}"><b>Servicios</b></a></li>
                  <li><a @if (Request::is('inicio/quienes-somos')) style="color:#E20089;" @else style="color:#000;" @endif href="{{ route('user.quienes.somos') }}"><b>Especialistas</b></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class=" footer-copyright">
            <div class=" row container black-text">
              <div class="col section s12 m6">
                <p>© 2023 Prophysio Huejutla</p> 
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank" href="https://www.instagram.com/prophysio_huejutla/"> <img width="30px" height="30px" src="<?php echo asset('iconos/instagram.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"  href="https://www.facebook.com/prophysioof?mibextid=ZbWKwL"> <img width="30px" height="30px" src="<?php echo asset('iconos/facebook.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"href="https://api.whatsapp.com/send?phone=5212225081501&text=Hola%2C%20gracias%20por%20comunicarte%20a%20Prophysio%2C%20%C2%BFen%20qu%C3%A9%20podemos%20ayudarte%3F%20"> <img width="30px" height="30px" src="<?php echo asset('iconos/whatsapp.png')?>"></a>
              </div>
            </div>
          </div>
    </footer>

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
        function ocultarChat(){
            var x = document.getElementById("chat");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                if($value == ""){
                    M.toast({html: 'Por favor, ingresa tu pregunta!'})
                    return;
                }
                $msg = ` <div class="col s12">
                <div class="row">
                    <div class="col s1"></div>
                    <div class="col s8" style="border-radius: 15px; background: #efefef; padding: 12px 15px ;">
                        <label class="black-text" style="word-break: break-all;  font-size: 15px;"> <b> ${$value} </b> </label>
                    </div>
                    <div class="col s2">
                        <center><i class="material-icons left black-text" style="padding: 10px 10px; border-radius:50%;  margin-right:10px; background: #efefef; " >person</i> </center>
                    </div>
                </div>
                </div>`;
                //$("#form").append($msg);
                document.getElementById("form").innerHTML += $msg;
                $("#data").val('');
                
                const link2 = 'http://127.0.0.1:8000/api/';
                const linkHost2 = 'https://prophysio.tagme.uno/public/api/';
                const linkAzure2 = 'https://prophysio.azurewebsites.net/api/';
                const urlDefinitiva2 = linkAzure2;
                // start ajax code
                $.ajax({
                    url: urlDefinitiva2 + "chatApi",
                    type: 'get',
                    data: 'pregunta='+$value,
                    success: function(result){
                        $replay = ` <div class="col s12">
                            <div class="row">
                                <div class="col s2">
                                    <center><i class="material-icons left black-text" style="padding: 10px 10px; border-radius:50%; background: #C7F7F7; " >person</i> </center>
                                </div>
                                <div class="col s8" style="border-radius: 15px; background: #C7F7F7; padding: 12px 15px ; margin-left:10px;">
                                    <label class="black-text" style="word-break: break-all;  font-size: 15px;"> <b> ${result} </b> </label>
                                </div>
                                <div class="col s2"></div>
                            </div>
                        </div>`;
                        $("#form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $("#form").scrollTop($("#form")[0].scrollHeight);
                    }
                }); 
            });
        });
    </script>
    @yield('scripts_styles')
</body>
</html>
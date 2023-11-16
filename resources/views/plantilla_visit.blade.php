<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    @yield('meta')
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @laravelPWA
    <title>@yield('title') </title>
    
</head>

<body>
    <div class="navbar-fixed">
        <nav style="background-color: #C7F7F7;" >
            <div class="nav-wrapper">
                <a href="{{ route('home')}}" style="padding-left:30px" class="brand-logo black-text">Prophysio</a>
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
    
                <ul class="right hide-on-med-and-down" style="padding-right:20px">
                    <li><a  href="{{ route('home') }}" style="<?php if(request()->Is('/')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>" class="">Inicio</a></li> 
                    <li>
                        <a class="" href="{{ route('agendar.cita') }}" style=" <?php if(request()->Is('agendar')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('servicios.mostrar') }}" style="<?php if(request()->Is('servicios')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Servicios
                            <i class="material-icons left">
                                build
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('blog.all') }}" style="<?php if(request()->Is('blog')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Blog
                            <i class="material-icons left">
                                forum
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesiones" style="<?php if (request()->Is('login') or request()->Is('register') or request()->Is('recuperar-contraseña') or request()->Is('recuperar contraseña')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Cuenta
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('quienes.somos') }}" style="<?php if(request()->Is('quienes-somos')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Nosotros
                            <i class="material-icons left">
                                people_outline
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('contacto.formulario') }}" style="<?php if(request()->Is('contacto')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Contacto
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
                </ul>
    
            </div>
            
        </nav>
    </div>

    <ul id="id_sesiones" class="dropdown-content">
        <li>
            <a class="black-text" href="{{ route('login.visit') }}">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="{{ route('register.visit') }}">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_sesionResp" class="dropdown-content">
        <li>
            <a class="black-text" href="{{ route('login.visit') }}">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="{{ route('register.visit') }}">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul class="sidenav" style="background-color: #FFFFFF"  id="menu-responsive">
        <li><a  href="{{ route('home')}}" style="<?php if(request()->Is('/')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>" class="">Inicio</a></li> 
                    <li>
                        <a class="" href="{{ route('agendar.cita') }}" style="<?php if(request()->Is('agendar')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('servicios.mostrar') }}" style="<?php if(request()->Is('servicios')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Servicios
                            <i class="material-icons left">
                                build
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('blog.all') }}" style="<?php if(request()->Is('blog')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Blog
                            <i class="material-icons left">
                            forum
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesionResp" style="<?php if (request()->Is('login') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Cuenta
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('quienes.somos') }}" style="<?php if(request()->Is('quienes-somos')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Nosotros
                            <i class="material-icons left">
                                people_outline
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('contacto.formulario') }}" style="<?php if(request()->Is('contacto')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Contacto
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
    </ul>

    @yield('content')

    <!-- chat-->
    <div class="row" id="chat" style="display:none">
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


    <footer class="page-footer" style="background-color: #C7F7F7;">
          <div class="container">
            <div class="row">
                <div class="col l4 m4 s12">
                    <h5 class="black-text"> Informacion</h5>
                    <ul>
                    <li><a class="" style="<?php if(request()->Is('politica-de-privacidad')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('politica.privacidad') }}"><b>Politica de privacidad</b></a></li>
                    <li><a class="" style="<?php if(request()->Is('preguntas-frecuentes')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('preguntas.frecuentes') }}"><b>Preguntas frecuentes</b></a></li>
                    <li><a class="" style="<?php if(request()->Is('terminos-y-condiciones')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('terminos.condiciones') }}"><b>Terminos y condiciones</b></a></li>
                    </ul>
                </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">Contacto</h5>
                <ul>
                  <li><a class="" href="{{ route('contacto.formulario') }}" style="<?php if(request()->Is('contacto')) echo 'color: #E20089;'; else echo 'color:#000000;';?>"><b>Correo electronico</b></a></li>
                  <li><p class="black-text text-lighten-3">Ubicacion: <br> Calle Coahulia. S/N. col. Tahuizan. Huejutla Hgo </p></li>
                  <li><p class="black-text text-lighten-3" >Telefono: +52 2225081501</p></li>
                </ul>
              </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">¿Quienes somos?</h5>
                <ul>
                  <li><a class="" style="<?php if(request()->Is('quienes-somos')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('quienes.somos') }}"><b>Mision y vision</b></a></li>
                  <li><a class="" style="<?php if(request()->Is('servicios')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('servicios.mostrar') }}"><b>Servicios</b></a></li>
                  <li><a class="" style="<?php if(request()->Is('quienes-somos')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('quienes.somos') }}"><b>Especialistas</b></a></li>
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
    <script src="https://prophysio.azurewebsites.net/js/chat.js"> </script>
    <script src="https://prophysio.azurewebsites.net/js/captcha.js"> </script>

</body>
</html>
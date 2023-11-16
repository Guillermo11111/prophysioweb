@extends('plantilla_visit')

@section('title', 'Agendar')

@section('content')

    <div class="section container">
    {{ Breadcrumbs::render('agenda') }}
        <div class="row">

            <form action="" method="post" class="col s12">
                <div class="row card-panel">

                    <center><b>Agendar una cita</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" type="email" class="validate" required>
                        <label for="correo">Correo electronico:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" type="tel" class="validate" required>
                        <label for="telefono">Telefono:</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select id="tipo" name="tipo">
                            @foreach ($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                        <label>Tipo de terapia</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select id="terapeuta" name="terapeuta">
                        <option value="0" disabled selected>Terapeuta</option>
                            @foreach ($terapeutas as $terapeuta)
                                <option value="{{$terapeuta->id}}">{{$terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno}}</option>
                            @endforeach
                        </select>
                        <label>Terapeuta</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="dia" type="text" name="dia" class="validate" readonly required>
                        <label for="dia">Fecha de la cita:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="hora" type="text" name="hora" class="validate" readonly required>
                        <label for="hora">Hora de la cita:</label>
                    </div>

                    <center>Para poder agendar <a class="" href="{{ route('login.visit') }}">inicia sesion aqui</a> ó <a class="" href="{{ route('register.visit') }}">registrate aqui</a></center>
                    <!--
                    <center><button class="btn" type="submit" value="">Agendar
                        <i class="material-icons left">
                            content_paste
                        </i>
                    </button></center>-->

                    <br>

                    

                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>

@endsection
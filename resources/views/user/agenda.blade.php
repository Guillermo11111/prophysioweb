@extends('user.plantilla_user')

@section('meta')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
@endsection

@section('title', 'Prophysio Huejutla - Agendar')

@section('content')

    
    <div class="section container">
    {{ Breadcrumbs::render('agendaU') }}
        <div class="row">

            <form action="{{URL::secure('inicio/agendar/guardar')}}" method="POST" class="col s12">
                @csrf
                <div class="row card-panel">

                    <center><b>Agendar una cita</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" value="{{Auth::user()->email}}" type="email" readonly class="validate" required>
                        <label for="correo">Correo electronico:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" value="{{Auth::user()->phone}}" type="tel" readonly class="validate" required>
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

                    <center><button class="btn" type="submit" value="">Agendar
                        <i class="material-icons left">
                            content_paste
                        </i>
                    </button></center>

                    <br>

                    

                </div>

                

            </form>
        </div>
        <div class="row">

            <div class="col s12"><center><b>Fechas disponibles</b></center></div>

            <div class="col s12" id='calendar'></div>
        </div>
    </div>
    <br><br><br>

@endsection

@section('scripts_styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.css">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/locales-all.min.js"></script>

    <script>

        var eventos = null;
        async function opcionCambiada(){
            if($terapeuta.value!==0){
                //alert($terapeuta.value)
                try {
         
                    const urlLo= `http://127.0.0.1:8000/api/obtenerAgenda`;
                    const urlHost= `https://prophysio.tagme.uno/public/api/obtenerAgenda`;
                    const urlAzure = `https://prophysio.tagme.uno/public/api/obtenerAgenda`;
                    const response = await axios.get(urlAzure+'?terapeuta='+$terapeuta.value);
                    eventos = response.data;
                    //console.log(eventos);
                    document.getElementById('dia').value='';
                    document.getElementById('hora').value='';
                    verCalendario();
                } catch (error) {
                    console.error(error);
                }
            }
            
        };

        const $terapeuta = document.getElementById('terapeuta')
        $terapeuta.addEventListener("change", opcionCambiada);
    </script>

    <script>

        function verCalendario() {
            var hoy = moment().format('YYYY-MM-DD');
            var unMesDespues = moment().add(1, 'months').format('YYYY-MM-DD');
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '10:00',
                slotMaxTime: '20:00',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek,timeGridDay'
                },
                validRange: {
                    start: hoy,
                    end: unMesDespues
                },
                dateClick:function(info){
                    // Utiliza moment.js para parsear la cadena de fecha y hora
                    var fechaHora = moment(info.dateStr);
                    // Obtiene la fecha en formato "YYYY-MM-DD"
                    var fecha = fechaHora.format('YYYY-MM-DD');
                    // Obtiene la hora en formato "HH:mm:ss"
                    var hora = fechaHora.format('HH:mm');

                    // Muestra los resultados
                    document.getElementById('dia').value=fecha;
                    document.getElementById('hora').value=hora;
                },
                events: eventos,
                locale: 'es', // Establece el idioma español 
                selectable: true, // Permite que las fechas sean seleccionables
                // Evento select que se activa cuando el usuario selecciona fechas
                select: function(start,jsEvent, view) {

                    // Si la fecha está en el rango permitido, verifica si coincide con alguna fecha de los eventos almacenados
                    var fechaSeleccionada = start.format('YYYY-MM-DD');
                    var fechaEvento;

                    // Recorre los eventos almacenados para verificar si la fecha seleccionada coincide con alguna de las fechas de los eventos
                    for (var i = 0; i < eventos.length; i++) {
                        fechaEvento = moment(eventos[i].start).format('YYYY-MM-DD');
                        if (fechaSeleccionada === fechaEvento) {
                            // Si la fecha coincide con un evento almacenado, muestra un mensaje y deselecciona la fecha
                            alert('No puedes seleccionar esta fecha porque ya hay un evento programado para este día.');
                            $('#calendario').fullCalendar('unselect');
                            return;
                        }
                    }
                },
                slotDuration: '01:00:00', // Intervalo de tiempo de 1 hora
            });
            calendar.render();
        };

     

    </script>

@endsection
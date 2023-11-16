@extends('terapeuta.plantilla_terapeuta')

@section('meta')

@endsection

@section('title', 'Panel Terapeuta')

@section('foto', asset('terapeutas/'.$terapeuta->foto))

@section('name', $terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno)

@section('content')
    
    <div class="section container">
        <center><h3>Agenda</h3></center>
        <div class="row">
            <div class="col s12" id='calendar'></div>
        </div>
    </div>
@endsection

@section('scripts_styles')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            slotMinTime: '08:00',
            slotMaxTime: '20:00',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: @json($events),
            locale: 'es', // Establece el idioma español 
        });
        calendar.render();
        });
    </script>
@endsection
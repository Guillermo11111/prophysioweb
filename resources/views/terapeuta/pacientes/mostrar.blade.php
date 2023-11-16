@extends('terapeuta.plantilla_terapeuta')

@section('meta')

@endsection

@section('title', 'Pacientes')

@section('foto', asset('terapeutas/'.$terapeuta->foto))

@section('name', $terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno)

@section('content')

@section('content')

    <div class="section container">
        <center><h3>Pacientes</h3></center>
        <div class="col s12">
            <a href="{{route('terapeuta.pacientes.exportar')}}" class="btn">Exportar csv</a>

        </div>
        <div class="col s12">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Tipo de lesion</th>
                        <th>Edad</th>
                        <th>Fotografia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <th>{{$paciente->nombres}}</th>
                            <th>{{$paciente->a_paterno}} {{$paciente->a_materno}}</th>
                            <th>{{$paciente->tipo_lesion}}</th>
                            <th>{{$paciente->edad}}</th>
                            <th><img width="150px" height="150px"  src="{{ asset('pacientes/'.$paciente->foto) }}" alt="{{$paciente->nombre}}"></th>
                        </tr>
                    @endforeach
                    
                </tbody>

            </table>
            <center> {{ $pacientes->links() }} </center>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="{{route('terapeuta.pacientes.create')}}" class="btn-floating btn-large red">
            <i class="large material-icons">create</i>
        </a>
    </div>


@endsection

@section('scripts_styles')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(elems);
        });
    </script>

    
    @if (session('info'))
    <script>
        M.toast({
            html: '{{ session("info")}} ',
            classes: 'black',
            displayLength: 3000,
        })
    </script>
    @endif
@endsection
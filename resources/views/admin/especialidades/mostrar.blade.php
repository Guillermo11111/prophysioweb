@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Ver Especialidades')

@section('content')

    <div class="section container">
        <center><h3>Especialidades</h3></center>
        <div class="col s12">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especialidades as $especialidad)
                        <tr>
                            <th>{{$especialidad->nombre}}</th>
                            <th>{{$especialidad->descripcion}}</th>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="{{route('admin.especialidades.create')}}" class="btn-floating btn-large red">
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
            displayLength: 4000,
        })
    </script>
    @endif
@endsection
@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Ver servicios')

@section('content')

    <div class="section container">
        <center><h3>Servicios</h3></center>
        <div class="col s12">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <th>{{$servicio->nombre}}</th>
                            <th>{{$servicio->descripcion}}</th>
                            <th><img width="300px" height="225px"  src="{{ asset('servicios_imagenes/'.$servicio->imagen) }}" alt="{{$servicio->alt}}"></th>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="{{route('admin.servicios.create')}}" class="btn-floating btn-large red">
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
        //alert("{{ session('info') }}");
    </script>
    @endif
@endsection
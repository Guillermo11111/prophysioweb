@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Informacion de la empresa')

@section('content')

    <div class="section container">
        <center><h3>Informacion de la empresa</h3></center>
        <div class="col s12">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Mision</th>
                        <th>Vision</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{$informacion->mision}}</th>
                        <th>{{$informacion->vision}}</th>
                        <th>{{$informacion->email}}</th>
                        <th>{{$informacion->phone}}</th>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="{{route('admin.empresa.edit')}}" class="btn-floating btn-large red">
            <i class="large material-icons">edit</i>
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
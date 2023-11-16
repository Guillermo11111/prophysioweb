@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Prophysio Huejutla')

@section('content')
    <div class="container section">
        <div class="row">
        @if (session('info'))
            <div class="col s12">
                <center>
                    <br><br>
                    <b>Se ha registrado tu cita correctamente</b> <br>
                    <p>El folio para tu cita es: <b> {{ session("info")}} </b>, con este folio podras consultar la informacion de tu cita</p>
                    <p>Para tu cita recuerda acudir con ropa comoda</p>
                </center>
            </div>
            <div class="col s12">
                <center><a href="{{route('user.inicio')}}" class="btn">Aceptar</a></center>
            </div>
            <br><br>
        @endif
        </div>
    </div>
<br><br><br>
@endsection

@section('scripts_styles')

@endsection


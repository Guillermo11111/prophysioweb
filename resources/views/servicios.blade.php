@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Servicios')

@section('content')
    
    
    <div class="container section">
    {{ Breadcrumbs::render('servicios') }}
        <div class="row">
            <center><h3>Nuestros Servicios</h3></center>
            <div class="col s12">
                @foreach($servicios as $servicio)
                <div class="row z-depth-2 section">
                    <center><h5>{{$servicio->nombre}}</h5></center>
                    <div class=" col s12 m7 l8" style="padding-left: 30px;">                        
                        {{$servicio->descripcion}}
                    </div>
                    <div class="col s12 m5 l4">
                        <center>
                            <img class="responsive-img" src="{{ asset('servicios_imagenes/'.$servicio->imagen) }}" alt="{{$servicio->alt}}">
                        </center>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    
@endsection
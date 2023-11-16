@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Contacto')

@section('content')

    
    <div class="section container">
    {{ Breadcrumbs::render('contacto') }}
        <div class="row ">

            <div class="col s0 m1"></div>
            <form action="{{ URL::secure('contacto-enviar') }}" method="POST" class="col m10 s12">
            @csrf
                <div class="row card-panel">

                    <center><b>Contactanos</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
                        <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" value="{{ old('correo') }}"  type="email" class="validate" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                        <label for="correo">Correo electronico:</label>
                        <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" value="{{ old('telefono') }}"  type="tel" class="validate" 
                        pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos" required>
                        <label for="telefono">Telefono:</label>
                        <strong style="color: red;">@error('telefono') {{ $message }} @enderror</strong> 
                    </div>



                    <div class="input-field col m12 s12">
                        <textarea id="mensaje" value="{{ old('mensaje') }}"  class="materialize-textarea validate" name="mensaje" required></textarea>
                        <label for="mensaje">Mensaje:</label>
                        <strong style="color: red;">@error('mensaje') {{ $message }} @enderror</strong> 
                    </div>

                    <center><button class="btn" type="submit" value="">Enviar
                        <i class="material-icons left">
                            send
                        </i>
                    </button></center>

                    <br>

                </div>

                

            </form>
        </div>

        <div class="row">
            <center><h4>Visitanos, nuestra ubicacion:</h4></center>
            <div id="map" class="col s12">

            </div>
        </div>
    </div>

    <script async 
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnXx_jG0Rev6Hw-tSaQdKLbvFRunowrGU&callback=initMap&v=weekly"
      defer
    ></script>

    <style>
    #map {
        height: 400px; /* The height is 400 pixels */
        width: 100%; /* The width is the width of the web page */
    }
    </style>

    <script>
        // Initialize and add the map
        function initMap() {
        // The location of Uluru
        const prophysio = { lat: 21.143141, lng: -98.422463, };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 19,
            center: prophysio,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: prophysio,
            map: map,
        });
        }

        window.initMap = initMap;
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
    <br><br><br>
    @endsection
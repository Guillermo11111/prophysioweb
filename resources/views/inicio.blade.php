@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla')

@section('content')
    <br>
    <div class="container section">
        <div class="row">
            <div class="col s12">
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <img src="{{ asset('slider/slider01.JPG') }}"> 
                        </li>
                        <li>
                            <img src="{{ asset('slider/slider02.JPG') }}"> 
                        </li>
                        <li>
                            <img src="{{ asset('slider/slider03.jpeg') }}"> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems,{
                duration: 600,
                interval: 3000,
                height: 600
            });
        });
    </script>

    
    @if (session('status'))
        <script>
            M.toast({
                html: '{{ session("status")}} ',
                classes: 'black',
                displayLength: 3000,
            })
        </script>
    @endif
@endsection
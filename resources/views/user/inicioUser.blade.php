@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Prophysio  Huejutla')

@section('content')
    <center><h3>Bienvenido @auth {{Auth::user()->name}} @endauth</h3></center>


    <!--
    <form method="POST" action="{{ route('user.logout') }}">
        @csrf
        <center><button type="submit" class="btn">
            Cerrar sesion
        </button></center> 
    </form>-->

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
@endsection

@section('scripts_styles')
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

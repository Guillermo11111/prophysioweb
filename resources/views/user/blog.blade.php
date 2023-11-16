@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Prophysio Huejutla - Blog')

@section('content')
    <div class="container section">
        <div class="row">
            <form id="busquedaA" action="" method="" class="col s12">
                <div class="row">
                    <div class="input-field col s7">
                        <select id="etiquetasLista" name="categoria"> 
                            <option selected value="all">TODOS</option>
                            @foreach ($etiquetas as $etiqueta)
                                <option value="{{$etiqueta->id}}">{{$etiqueta->nombre}}</option>
                            @endforeach
                        </select>
                        <label>Etiquetas</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
        {{ Breadcrumbs::render('blogU') }}
        </div>

        <div id="circulo" class="center section hide">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
    
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
    
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
    
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="blogs" class="row">
            


        </div>
    </div>

@endsection

@section('scripts_styles')
    <style>
        .contBlog{
            transition: all 300ms;
        }
        .contBlog:hover{
            transform: scale(1.10);
        }
        .enlace{
            background-color: white;
            border: 0px;
            color: #FFB219;
        }
        .enlace:hover{
            cursor: pointer;
        }
    </style>
    <script type="" src="https://prophysio.azurewebsites.net/js/blog.js"></script>

    <script>
        verBlogs();
    </script>
@endsection


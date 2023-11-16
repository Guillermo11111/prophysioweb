@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Restaurar base de datos')

@section('content')
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12">
                <center><h2>Restaurar Base de datos</h2></center>
            </div>
            <div class="col s12">
                <p>
                   <b>Seleccione el archivo .sql para restaurar su base de datos de manera completa</b>
                </p> 
            </div>
            <form action="{{ route('admin.db.restore.completo') }}" enctype="multipart/form-data" method="POST" class="col s12">
            @csrf 
                <div class="row ">
                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>Base de datos</span>
                            <input type="file" required name="scriptbd" id="scriptbd" accept=".sql" >
                        </div>
                        <div class="file-path-wrapper">
                            <input required class="file-path validate" type="text">
                        </div>
                        @if (session('info'))
                            <strong style="color: red;"> {{session('info')}} </strong> 
                        @endif
                    </div>


                    <center><button class="btn waves-effect waves-light" type="submit" value="">Restaurar Base de datos
                        <i class="material-icons left">
                            restore
                        </i>
                    </button></center>


                </div>

            </form>
        </div>
    </div>
@endsection

@section('scripts_styles')

@endsection
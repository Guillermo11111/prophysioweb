@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Crear blog')

@section('content')
<div class="row container section">
            <form action="{{ route('admin.servicios.store') }}" enctype="multipart/form-data" method="POST" class="col s12">

            @csrf 
                <div class="row card-panel">

                    <center><b>Agregar un servicio</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required
                        minlength="5" maxlength="255" title="El nombre debe tener al menos una longitud de 5 letras y maximo 255">
                        <label for="nombre">Nombre:</label>
                        <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col s12">
                        <input id="descripcion" type="text" value="{{ old('descripcion') }}" name="descripcion" class="validate" required
                        minlength="10" maxlength="255" title="El nombre debe tener al menos una longitud de 10 letras y maximo 255">
                        <label for="descripcion">Descripcion del servicio:</label>
                        <strong style="color: red;">@error('descripcion') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>Imagen</span>
                            <input type="file" required name="imagen" id="imagen" onchange="vistaPreliminar(event)" accept=".jpeg,.jpg,.png" >
                        </div>
                        <div class="file-path-wrapper">
                            <input required class="file-path validate" type="text">
                        </div>
                        <strong style="color: red;">@error('imagen') {{ $message }} @enderror</strong> 
                    </div>

                    <div style="display: none" id="div-imagen" class="col s12">
                        <center><img src="" width="300px" height="225px" alt="" id="img-foto"></center>
                    </div>

                    <div class="input-field col s12">
                        <input id="alternativo" type="text" value="{{ old('alternativo') }}" name="alternativo" class="materialize-textarea validate" required
                        minlength="10" maxlength="50" title="El nombre debe tener al menos una longitud de 10 letras y maximo 50">
                        <label for="alternativo">Texto alternativo:</label>
                        <strong style="color: red;">@error('alternativo') {{ $message }} @enderror</strong> 
                    </div>


                    <center><button class="btn waves-effect waves-light" type="submit" value="">Agregar
                        <i class="material-icons left">
                            create
                        </i>
                    </button></center>

            
                </div>

        </form>
    </div>

    <div class="fixed-action-btn">
        <a href="{{route('admin.blog.show')}}" class="btn-floating btn-large red" >
            <i class="large material-icons">arrow_back</i>
        </a>
    </div>
@endsection

@section('scripts_styles')

@endsection
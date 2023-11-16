@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Agregar Especialidades')

@section('content')

    <div class="row container section">
            <form action="{{ route('admin.especialidades.store') }}" method="POST" class="col s12">

            @csrf 
                <div class="row card-panel">

                    <center><b>Agregar una Especialidad</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required
                        minlength="5" maxlength="255" title="El nombre debe tener al menos una longitud de 5 letras y maximo 255">
                        <label for="nombre">Nombre de la nueva especialidad:</label>
                        <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col s12">
                        <input id="descripcion" type="text" value="{{ old('descripcion') }}" name="descripcion" class="validate" required
                        minlength="10" maxlength="255" title="El nombre debe tener al menos una longitud de 10 letras y maximo 255">
                        <label for="descripcion">Descripcion:</label>
                        <strong style="color: red;">@error('descripcion') {{ $message }} @enderror</strong> 
                    </div>

                    <center><button class="btn waves-effect waves-light" type="submit" value="">Agregar
                        <i class="material-icons left">
                            add
                        </i>
                    </button></center>

            
                </div>

        </form>
    </div>

    <div class="fixed-action-btn">
        <a href="{{route('admin.especialidades.show')}}" class="btn-floating btn-large red" >
            <i class="large material-icons">arrow_back</i>
        </a>
    </div>
@endsection

@section('scripts_styles')

@endsection
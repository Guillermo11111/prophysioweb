@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Agregar Especialidades')

@section('content')

    <div class="row container section">
            <form action="{{ route('admin.empresa.store') }}" method="POST" class="col s12">

            @csrf 
                <div class="row card-panel">

                    <center><b>Actualizar informacion de la empresa</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="mision" type="text" value="{{ $informacion->mision }}" name="mision" class="validate" required
                        minlength="20" maxlength="255" title="La mision debe tener al menos una longitud de 20 letras y maximo 255">
                        <label for="mision">Nueva Mision:</label>
                        <strong style="color: red;">@error('mision') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col s12">
                        <input id="vision" type="text" value="{{ $informacion->vision }}" name="vision" class="validate" required
                        minlength="20" maxlength="255" title="La vision debe tener al menos una longitud de 20 letras y maximo 255">
                        <label for="vision">Nueva Vision:</label>
                        <strong style="color: red;">@error('vision') {{ $message }} @enderror</strong> 
                    </div>

                    <center><button class="btn waves-effect waves-light" type="submit" value="">Actualizar
                        <i class="material-icons left">
                            edit
                        </i>
                    </button></center>

            
                </div>

        </form>
    </div>

    <div class="fixed-action-btn">
        <a href="{{route('admin.empresa.show')}}" class="btn-floating btn-large red" >
            <i class="large material-icons">arrow_back</i>
        </a>
    </div>
@endsection

@section('scripts_styles')

@endsection
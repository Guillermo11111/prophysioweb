@extends('user.plantilla_user')

@section('title', 'Autenticacion de doble factor')

@section('content')
<br><br><br>
    <div class="container section">
        <div class="row card-panel">
            <center><strong>Autenticacion de doble factor</strong> </center>
            <div class="col s12">
                <p>La autenticación de dos factores (2FA) fortalece la seguridad de acceso al requerir dos métodos (también conocidos como factores) para verificar su identidad. La autenticación de dos factores protege contra el phishing, la ingeniería social y los ataques de fuerza bruta de contraseñas y protege sus inicios de sesión de atacantes que explotan credenciales débiles o robadas.</p>
            </div>
            @if ($errors->any())
                <div class="col s12" style="color: #FFAA00">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            Ingrese el pin de la aplicación Google Authenticator:<br/><br/>
            <form class="row" action="{{ route('2faVerify') }}" method="POST">
            @csrf
                <div class="input-field col s12">
                    <input id="one_time_password" name="one_time_password" type="text" value="" required class="validate" >
                    <label for="one_time_password">Contraseña de un solo uso:</label>
                    @if ($errors->has('verify-code'))
                        <strong style="color: red;">{{ $errors->first('verify-code') }}</strong> 
                    @endif
                </div>
                <div class="col s12">
                    <button type="submit" class="btn">
                        Autenticar
                    </button>
                </div>   
            </form>
        </div>
    </div>
@endsection

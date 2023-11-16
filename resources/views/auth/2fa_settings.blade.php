@extends('user.plantilla_user')

@section('title', 'Autenticacion de doble factor')

@section('content')
<br><br><br>
    <div class="container section">
        <div class="row card-panel">
            <div class="col s12">
                <strong>Autenticacion de doble factor</strong>
            </div>
            <div class="col s12">
                <p>La autenticación de dos factores (2FA) fortalece la seguridad de acceso al requerir dos métodos (también conocidos como factores) para verificar su identidad. La autenticación de dos factores protege contra el phishing, la ingeniería social y los ataques de fuerza bruta de contraseñas y protege sus inicios de sesión de atacantes que explotan credenciales débiles o robadas.</p>
            </div>
            <div class="col s12">
                @if (session('error'))
                    <strong style="color: red;">{{ session('error') }}</strong> 
                @endif
            </div>
            <div class="col s12">
                @if (session('success'))
                    <strong style="color: #FFAA00;">{{ session('success') }}</strong> 
                @endif
            </div>
            @if($data['user']->loginSecurity == null)
                <form action="{{ route('generate2faSecret') }}" method="POST" class="col s12">
                    @csrf
                    <button type="submit" class="btn">
                        Generar clave secreta para habilitar 2FA
                    </button>
                </form>

            @elseif(!$data['user']->loginSecurity->google2fa_enable)
                1. Escanee este código QR con su aplicación Google Authenticator. Alternativamente, puedes usar el código: <code>{{ $data['secret'] }}</code><br/>
                <div>
                    {!! $data['google2fa_url'] !!}
                </div>
                <!-- <img src="{{ $data['google2fa_url'] }}" class="responsive-img" alt="QR code"> -->
                <br><br>
                2. Ingrese el pin de la aplicación Google Authenticator:<br><br>
                <form class="row" method="POST" action="{{ route('enable2fa') }}">
                    @csrf
                    <div class="input-field col s12">
                        <input id="secret" name="secret" type="password" value="" required class="validate" >
                        <label for="secret">Codigo de autenticacion:</label>
                        @if ($errors->has('verify-code'))
                            <strong style="color: red;">{{ $errors->first('verify-code') }}</strong> 
                        @endif
                    </div>
                    <div class="col s12">
                        <button type="submit" class="btn">
                            Habilitar 2FA
                        </button>
                    </div>                    
                </form>
            @elseif($data['user']->loginSecurity->google2fa_enable)
                <div class="col s12 green-text">
                    2FA está actualmente <strong>habilitada</strong> en su cuenta.
                </div>
                <div class="col s12">
                    <p>Si está buscando deshabilitar la autenticación de dos factores. Confirme su contraseña y haga clic en el botón "Deshabilitar 2FA".</p>
                </div>
                <form class="row" method="POST" action="{{ route('disable2fa') }}">
                    @csrf
                    <div class="input-field col s12">
                        <input id="current-password" type="password" class="validate" name="current-password" required>
                        <label for="current-password" class="">Contraseña actual:</label>
                            @if ($errors->has('current-password'))
                                <strong>{{ $errors->first('current-password') }}</strong>
                            @endif
                    </div>
                    <div class="col s12">
                        <button type="submit" class="btn">
                            Deshabilitar 2FA
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
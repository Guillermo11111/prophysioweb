@extends('terapeuta.plantilla_terapeuta')

@section('meta')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@endsection

@section('title', 'Registrar Pacientes')

@section('foto', asset('terapeutas/'.$terapeuta->foto))

@section('name', $terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno)

@section('content')
    <div class="row container section">
            <form action="{{ route('terapeuta.pacientes.store') }}" enctype="multipart/form-data" method="POST" class="col s12">

            @csrf 
                <div class="row card-panel">

                    <center><b>Registrar un paciente</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required
                        pattern="p{L}+[a-zA-Z]+" title="El nombre no puede tener mas de 255 letras, no puedes colocar numeros">
                        <label for="nombre">Nombres:</label>
                        <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col m6 s12">
                        <input id="ap" type="text" value="{{ old('ap') }}" name="ap" class="validate" required
                        pattern="p{L}+[a-zA-Z]+" title="El apellido no puede tener mas de 255 letras, no puedes colocar numeros">
                        <label for="ap">Apellido paterno:</label>
                        <strong style="color: red;">@error('ap') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="am" type="text" value="{{ old('am') }}" name="am" class="validate" required
                        pattern="[a-zA-Z]+" title="El apellido no puede tener mas de 255 letras, no puedes colocar numeros">
                        <label for="am">Apellido materno:</label>
                        <strong style="color: red;">@error('am') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12">
                        <select id="user" name="user"> 
                            @foreach ($usuarios as $user)
                                <option value="{{$user->id}}">{{$user->name.' - '.$user->email.' - '.$user->phone}}</option>
                            @endforeach
                        </select>
                        <label>Usuario</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="edad" name="edad" type="text" value="{{ old('edad') }}" class="validate" 
                        pattern="^(?:[1-9]|[1-9][0-9]|100)$" required>
                        <label for="edad">Edad:</label>
                        <strong style="color: red;">@error('edad') {{ $message }} @enderror</strong> 

                        <input id="fechaNac" name="fechaNac" type="text"  class="datepicker validate" required>
                        <label for="fechaNac">Fecha de nacimiento:</label>
                        <strong style="color: red;">@error('fechaNac') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12 m6">
                        Sexo
                        <p>
                            <label>
                                <input class="with-gap validate" value="Hombre" name="sexo" type="radio" checked/>
                                <span>Hombre</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap validate" value="Mujer" name="sexo" type="radio" />
                                <span>Mujer</span>
                        </label>
                        </p>
                        <strong style="color: red;">@error('sexo') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="peso" name="peso" type="number" step="0.001" value="{{ old('peso') }}" class="validate" required>
                        <label for="peso">Peso en kg:</label>
                        <strong style="color: red;">@error('peso') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col m6 s12">
                        <input id="estatura" name="estatura" type="number" step="0.01" value="{{ old('estatura') }}" class="validate" required>
                        <label for="estatura">Estatura en metros:</label>
                        <strong style="color: red;">@error('estatura') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="imc" name="imc" type="number" readonly step="0.001" value="{{ old('imc') }}" class="validate" required>
                        <label for="imc">Indice de masa Corporal:</label>
                        <strong style="color: red;">@error('imc') {{ $message }} @enderror</strong> 
                        <button onclick="calcularIMC()" class="btn">Calcular IMC</button>
                    </div>

                    <div class="input-field col s12 m6">
                        Hipertension
                        <p>
                            <label>
                                <input class="with-gap validate" value="0" name="hipertencion" type="radio" checked/>
                                <span>No</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap validate" value="1" name="hipertencion" type="radio" />
                                <span>Si</span>
                        </label>
                        </p>
                        <strong style="color: red;">@error('hipertencion') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12 m6">
                        Lesiones previas
                        <p>
                            <label>
                                <input class="with-gap validate" value="0" name="lesiones" type="radio" checked/>
                                <span>No</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap validate" value="1" name="lesiones" type="radio" />
                                <span>Si</span>
                        </label>
                        </p>
                        <strong style="color: red;">@error('lesiones') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12 m6">
                        Osteoporosis
                        <p>
                            <label>
                                <input class="with-gap validate" value="0" name="osteoporosis" type="radio" checked/>
                                <span>No</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap validate" value="1" name="osteoporosis" type="radio" />
                                <span>Si</span>
                        </label>
                        </p>
                        <strong style="color: red;">@error('osteoporosis') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12 m6">
                        Migrañas
                        <p>
                            <label>
                                <input class="with-gap validate" value="0" name="mig" type="radio" checked/>
                                <span>No</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap validate" value="1" name="mig" type="radio" />
                                <span>Si</span>
                        </label>
                        </p>
                        <strong style="color: red;">@error('mig') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <select id="tipo" name="tipo"> 
                            <option value="rodilla">Rodilla</option>
                            <option value="espalda">Espalda</option>
                            <option value="hombro">Hombro</option>
                            <option value="cuello">Cuello</option>
                        </select>
                        <label>Tipo de lesion</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <select id="gravedad" name="gravedad"> 
                            <option value="leve">Leve</option>
                            <option value="moderada">Moderada</option>
                            <option value="grave">Grave</option>
                            <option value="severa">Severa</option>
                        </select>
                        <label>Gravedad de la lesion</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <select id="aptitud" name="aptitud"> 
                            <option value="bajo">Bajo</option>
                            <option value="medio">Medio</option>
                            <option value="alto">Alto</option>
                        </select>
                        <label>Nivel de aptitud fisica</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="cv" name="cv" type="number" value="{{ old('cv') }}" class="validate" required>
                        <label for="cv">Cantidad de sesiones de recuperacion necesarias:</label>
                        <strong style="color: red;">@error('cv') {{ $message }} @enderror</strong> 
                        <button onclick="predecirSesiones()" class="btn">Calcular cantidad</button>
                    </div>

                    
                    <div class="input-field col m6 s12">
                        <input id="estatura" name="estatura" type="number" step="0.01" value="{{ old('estatura') }}" class="validate" required>
                        <label for="estatura">Estatura en cm:</label>
                        <strong style="color: red;">@error('estatura') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="file-field input-field col m6 s12">
                        <div class="btn">
                            <span>Fotografia</span>
                            <input type="file" required name="fotografia" id="fotografia" onchange="vistaPreliminar(event)" accept=".jpeg,.jpg,.png" >
                        </div>
                        <div class="file-path-wrapper">
                            <input required class="file-path validate" type="text">
                        </div>
                        <strong style="color: red;">@error('fotografia') {{ $message }} @enderror</strong> 
                    </div>

                    <div style="display: none" id="div-imagen" class="col m6 s12">
                        <center><img src="" width="150px" height="150px" alt="" id="img-foto"></center>
                    </div>

                    <div class="col s12">
                        <p>Datos de direccion</p>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="cp" name="cp" type="text" value="{{ old('cp') }}" class="validate" pattern="[0-9]{5}" 
                        title="Ingresa un codigo postal valido" required>
                        <label for="cp">Codigo postal:</label>
                        <strong style="color: red;">@error('cp') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="municipio" name="municipio" type="text" value="{{ old('municipio') }}" class="validate" pattern="p{L}+[a-zA-Z]+" 
                        title="Ingresa un municipio valido" required>
                        <label for="municipio">Municipio:</label>
                        <strong style="color: red;">@error('municipio') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col m6 s12">
                        <input id="colonia" name="colonia" type="text" value="{{ old('colonia') }}" class="validate" pattern="p{L}+[a-zA-Z][0-9]+" 
                        title="Ingresa una colonia valida" required>
                        <label for="colonia">Colonia:</label>
                        <strong style="color: red;">@error('colonia') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="calle" name="calle" type="text" value="{{ old('calle') }}" class="validate" pattern="p{L}+[a-zA-Z][0-9]+" 
                        title="Ingresa una calle valida" required>
                        <label for="calle">Calle:</label>
                        <strong style="color: red;">@error('calle') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="nc" name="nc" type="text" value="{{ old('nc') }}" class="validate" pattern="[a-zA-Z0-9]+" 
                        required>
                        <label for="nc">Numero de casa:</label>
                        <strong style="color: red;">@error('nc') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12">

                        <input id="cv" name="cv" type="number" value="{{ old('cv') }}" class="validate" required>
                        <label for="cv">Cantidad de visitas necesarias:</label>
                        <strong style="color: red;">@error('cv') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12">
                        <input id="enfermedades" type="text" value="{{ old('enfermedades') }}" name="enfermedades" class="validate" required>
                        <label for="enfermedades">Alergias y/o enfermedades:</label>
                        <strong style="color: red;">@error('enfermedades') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12">

                        <input id="causa" type="text" value="{{ old('causa') }}" name="causa" class="validate" required>
                        <label for="causa">Situacion por la cual necesita terapia:</label>
                        <strong style="color: red;">@error('causa') {{ $message }} @enderror</strong> 
                    </div>


                    <div class="col s12">
                        <center><button class="btn waves-effect waves-light" type="submit" value="">Registrar
                            <i class="material-icons left">
                                create
                            </i>
                        </button></center>
                    </div>


            
                </div>

        </form>
    </div>

    <div class="fixed-action-btn">
        <a href="{{route('terapeuta.pacientes.show')}}" class="btn-floating btn-large red" >
            <i class="large material-icons">arrow_back</i>
        </a>
    </div>
@endsection

@section('scripts_styles')

    <script>
        let vistaPreliminar = (event)=>{
            let leer_img = new FileReader();
            let id_img = document.getElementById('img-foto');
            document.getElementById('div-imagen').style.display = 'block';
            leer_img.onload = ()=>{
                if(leer_img.readyState==2){
                    id_img.src = leer_img.result;
                }
            }
            leer_img.readAsDataURL(event.target.files[0])
        }
    </script>

    <script>

        function calcularIMC() {
            var peso = parseFloat(document.getElementById('peso').value);
            var altura = parseFloat(document.getElementById('estatura').value);

            if (isNaN(peso) || isNaN(altura) || peso <= 0 || altura <= 0) {
                alert('Ingresa valores válidos para el peso y la altura.');
                return;
            }

            var imc = peso / (altura * altura);

            document.getElementById('imc').value = imc.toFixed(2);
        }
    </script>

    <script>
        function validar(){
            var peso = parseFloat(document.getElementById('peso').value);
            var altura = parseFloat(document.getElementById('estatura').value);
            var edad = parseFloat(document.getElementById('edad').value);
            var imc = parseFloat(document.getElementById('imc').value);
            var bandera = true;
            if (isNaN(peso) || isNaN(altura) || peso == "" || altura == "" || isNaN(edad) || isNaN(imc) || edad == "" || imc == "") {
                bandera = false;
            }
            return bandera;
        }
        function obtenerDatos(){
            //obteniendo valores para la prediccion
            if(!validar()){
                return false;
            }
            const gravedadV = document.getElementById('gravedad').value;
            if(gravedadV=='leve')
                var gravedad = '0'
            if(gravedadV=='grave')
                var gravedad = '1'
            if(gravedadV=='moderada')
                var gravedad = '2'
            if(gravedadV=='severa')
                var gravedad = '3'
            const tipoV = document.getElementById('tipo').value;
            if(tipoV=='cuello')
                var tipo = '0'
            if(tipoV=='espalda')
                var tipo = '1'
            if(tipoV=='hombro')
                var tipo = '2'
            if(tipoV=='rodilla')
                var tipo = '3'
            const imc = document.getElementById('imc').value;
            const edad = document.getElementById('edad').value;
            const osteoporosisOpc = document.getElementsByName('osteoporosis');
            for (var i = 0; i < osteoporosisOpc.length; i++) {
                if (osteoporosisOpc[i].checked) {
                    var osteoporosis = osteoporosisOpc[i].value;
                    break; // Termina el loop, ya que solo un radio button puede estar seleccionado
                }
            }
            const aptitudV = document.getElementById('aptitud').value;
            if(aptitudV=='alto')
                var aptitud = '0'
            if(aptitudV=='bajo')
                var aptitud = '1'
            if(aptitudV=='medio')
                var aptitud = '2'
            const lesionesOpc = document.getElementsByName('lesiones');
            for (var i = 0; i < lesionesOpc.length; i++) {
                if (lesionesOpc[i].checked) {
                    var lesiones = lesionesOpc[i].value;
                    break; // Termina el loop, ya que solo un radio button puede estar seleccionado
                }
            }
            const hipertencionOpc = document.getElementsByName('hipertencion');
            for (var i = 0; i < hipertencionOpc.length; i++) {
                if (hipertencionOpc[i].checked) {
                    var hipertencion = hipertencionOpc[i].value;
                    break; // Termina el loop, ya que solo un radio button puede estar seleccionado
                }
            }
            const migOpc = document.getElementsByName('mig');
            for (var i = 0; i < migOpc.length; i++) {
                if (migOpc[i].checked) {
                    var mig = migOpc[i].value;
                    break; // Termina el loop, ya que solo un radio button puede estar seleccionado
                }
            }
            const data = { 'Gravedad de la Lesion': Number(gravedad), 'Tipo de Lesion': Number(tipo), 'IMC': Number(imc), 
                'Edad': Number(edad), 'Osteoporosis': Number(osteoporosis), 'Nivel de aptitud fisica': Number(aptitud), 
                'Lesion Previa': Number(lesiones), 'Hipertension': Number(hipertencion), 'Migranas': Number(mig) };
            return data;
        }

        async function predecirSesiones(){
            try {
                const data =obtenerDatos();
                if(data == false){
                    alert("Debes llenar todos los campos antes");
                    return;
                }
                console.log(data);
        
                const urlForest= `https://angelyahir.pythonanywhere.com/predict/`;
                const urlKeras= `https://angelyahir.pythonanywhere.com/predictKeras/`;

                const response = await axios.post(urlKeras,JSON.stringify(data));
                const resultado = response.data;
                console.log(resultado);
                document.getElementById("cv").value = Math.round(resultado['prediction'])
            } catch (error) {
                console.error(error);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                format: 'dd mmm, yyyy',
                yearRange: [1923,2023],
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
                    cancel : 'cancelar',
                    clear: 'limpiar'
                }
            });
        });

    </script>
@endsection
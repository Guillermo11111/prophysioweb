@extends('terapeuta.plantilla_terapeuta')

@section('meta')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@section('title', 'Panel Terapeuta')

@section('foto', asset('terapeutas/'.$terapeuta->foto))

@section('name', $terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno)

@section('content')
<div class="section container">
    <div class="row">
        <div class="col s12 l4 m3"></div>
        <div class="input-field col s11 l3 m5">
            <input id="folio" name="folio" type="number" class="validate" required>
            <label for="folio">Folio:</label>
        </div>
        <div class="col s1">
            <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="buscarCita()"><i class="material-icons medium">search</i></button>
        </div>
    </div>
    <div class="row" style="font-size: 30px;">
        <b id="mensajeError"></b>
        <div id="resultado" class="col s12" style="display: none;">
            <b>Dia: </b> <strong id="dia">Hoy</strong> <br>
            <b>Hora: </b> <strong id="hora">Hoy</strong> <br>
            <b>Paciente: </b> <strong id="user">Hoy</strong> <br>
            <b>Terapeuta: </b> <strong id="terapeuta">Hoy</strong> <br>
            <b>Tipo de terapia: </b> <strong id="tipo">Hoy</strong> <br>
        </div>
    </div>
</div>

@endsection

@section('scripts_styles')
    <script>
        async function buscarCita(){
            try {
            const folio = document.getElementById('folio').value;
            const resultado = document.getElementById('resultado');
            const url= `https://prophysio.tagme.uno/public/api/consultaCita?folio=${folio}`;
            const url2= `http://127.0.0.1:8000/api/consultaCita?folio=${folio}`;

            const response = await axios.get(url2);
            const cita = response.data;
            
            if(!cita){
                document.getElementById('mensajeError').innerHTML='No se encontro la cita'
                document.getElementById('mensajeError').style.display = 'block';
                resultado.style.display = 'none';
            }
            else{
                if(cita['estado']=='2'){
                    document.getElementById('mensajeError').innerHTML='Esa cita fue cancelada'
                    document.getElementById('mensajeError').style.display = 'block';
                    resultado.style.display = 'none';
                } 
                else if(cita['estado']=='3'){
                    document.getElementById('mensajeError').innerHTML='Esa cita ya fue antendida';
                    document.getElementById('mensajeError').style.display = 'block';
                    const dataArr=cita['fecha'].split(' ');
                    var day=dataArr[0];
                    var hours=dataArr[1];
                    document.getElementById('user').innerHTML = cita['nombre'];
                    document.getElementById('dia').innerHTML = day;
                    document.getElementById('hora').innerHTML= hours;
                    document.getElementById('tipo').innerHTML= cita['tipoTerapia'];
                    document.getElementById('terapeuta').innerHTML= cita['terapeuta'];
                    resultado.style.display = 'block';
                }
                else if(cita['estado']=='1'){
                    const dataArr=cita['fecha'].split(' ');
                    var day=dataArr[0];
                    var hours=dataArr[1];
                    document.getElementById('user').innerHTML = cita['nombre'];
                    document.getElementById('dia').innerHTML = day;
                    document.getElementById('hora').innerHTML= hours;
                    document.getElementById('tipo').innerHTML= cita['tipoTerapia'];
                    document.getElementById('terapeuta').innerHTML= cita['terapeuta'];
                    document.getElementById('mensajeError').style.display = 'none';
                    resultado.style.display = 'block';
                }
            }
            } catch (error) {
                document.getElementById('mensajeError').innerHTML='Ocurrio un error al buscar la cita'
                document.getElementById('mensajeError').style.display = 'block';
                resultado.style.display = 'none';
                console.error(error);
            }
        }
    </script>
@endsection
@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Copia de seguridad')

@section('content')
    <div class="container">
        <div class="row section">
            <div class="col l7 s12">
                <div class="row">
                    <center><h2>Copias de Seguridad</h2></center>
                    <div class="col s12">
                        <h4>Respaldar base de datos de manera completa</h4>
                        <p>
                            Este respaldo guardara un archivo .sql en el dispositivo, este puede ser posteriormente usado para restaurar su base de datos.
                        </p>
                        <center><a href="{{route('admin.db.backup.completo')}}" class="btn">Respaldo completo </a></center>
                    </div>
                    <form action="{{ route('admin.db.backup.tabla') }}" method="post" class="col s12">
                        <h4>Respaldar una tabla</h4>
                        <p>
                            Se realizara una copia de seguridad unicamente de la tabla seleccionada.
                        </p>
                        <div class="row card-pane">
                            @csrf
                            <div class="col s12 input-field">
                                <select name="name_table" id="">
                                    <option value="citas">Citas</option>
                                    <option value="pacientes">Pacientes</option>
                                    <option value="terapeutas">Terapeutas</option>
                                    <option value="servicios">Servicios</option>
                                    <option value="users">Usuarios</option>
                                    <option value="blogs">Articulos</option>
                                    <option value="tags">Etiquetas</option>
                                    <option value="tipo_terapia">Tipos de terapias</option>
                                    <option value="especialidades">Especialidades</option>
                                    <option value="coments">Comentarios</option>
                                    <option value="infomracion_empresa">Informacion de la empresa</option>
                                    <option value="historial_respaldos">Historial de respaldos</option>
                                    <option value="chats">Preguntas chat</option>
                                    <option value="preguntasfrecuentes">Preguntas Frecuentes</option>
                                </select>
                                <label for="name_table">Tabla</label>
                            </div>
                            <center><input class="btn" type="submit" value="Respaldar Tabla"> </input></center>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col l5 s12">
                <center><h3>Historial de respaldos</h3></center>
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre del respaldo</th>
                            <th>Tipo de respaldo</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historial as $respaldo)
                            <tr>
                                <th>{{$respaldo->created_at}}</th>
                                <th>{{$respaldo->nombre_respaldo}}</th>
                                <th>{{$respaldo->tipo_respaldo}}</th>
                                <th>{{$respaldo->name}}</th>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection

@section('scripts_styles')

@endsection
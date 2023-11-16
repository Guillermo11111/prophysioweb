@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Prophysio Huejutla - ¿Quines somos?')

@section('content')
    <div class="container section">
    {{ Breadcrumbs::render('nosotrosU') }}
        <center><h2>Prophysio Huejutla</h2></center>

        <div class="row">
            <div class="col s12 m6">
                <h4>Mision</h4>
                <p>{{$informacion->mision}}</p>
            </div>
            <div class="col s12 m6">
                <h4>Vision</h4>
                <p>{{$informacion->vision}}</p>
            </div>
        </div>


        <div class="row">
            <center><h3>Nuestros especialistas</h3></center>
            <div class="col s12" >

                <!--Aqui inicia plantilla para mostrar terapeutas -->
                <div class="row z-depth-2 section">
                    <div class="col s12 m5 l4">
                        <img class="responsive-img" src="{{ asset('terapeutas/lizbeth_mendoza.jpeg') }}">
            
                    </div>
                    <div class="col s12 m7 l8">
                        <center><b>Lizbeth Mendoza</b></center>
                        <center>Lic. en Fisioterapia</center>
                        <ul>
                            <li>- Diplomado Internacional de Fisioterapia en Oncología</li>
                            <li>- Diplomado de Evaluacion e Intervencion en Desarrollo Motriz</li>
                            <li>- Certificado Internacional en Linfoterapia</li>
                            <li>- Certificado en Terapia Manual Instrumentalizada</li>
                            <li>- Certificacion Internacional DYNAMIC TAPING</li>
                            <li>- Certificacion Internacional Taping Neuro Muscular</li>
                            <li>- Experiencia Clinica y hospitalaria en servicios en reumatología, pediatria y oncologia</li>
                        </ul>
                    </div>
                </div>
                <!-- fin plantilla -->

            </div>

        </div>


    </div>
@endsection

@section('scripts_styles')

@endsection


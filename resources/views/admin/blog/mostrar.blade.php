@extends('admin.plantilla_admin')

@section('meta')

@endsection

@section('title', 'Blogs')

@section('content')

    <div class="container section row">
        <center><h3>Blogs</h3></center>
        <div class="col s12">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <th>{{$blog->nombre}}</th>
                            @if ($blog->estado == 1)
                                <th>Visible</th>
                            @else
                                <th>Oculto</th>
                            @endif
                            
                            <th><img width="200px" height="225px" src="{{ asset($blog->imagen) }}" alt="{{$blog->alt}}"></th>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
        <div class="fixed-action-btn">
            <a href="#" class="btn-floating btn-large red">
                <i class="large material-icons">create</i>
            </a>
        </div>
    </div>
@endsection

@section('scripts_styles')

@endsection
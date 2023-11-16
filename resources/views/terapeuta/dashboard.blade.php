@extends('terapeuta.plantilla_terapeuta')

@section('meta')

@endsection

@section('title', 'Panel Terapeuta')

@section('foto', asset('terapeutas/'.$terapeuta->foto))

@section('name', $terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno)

@section('content')
    <h1>panel Terapeuta</h1>
@endsection

@section('scripts_styles')

@endsection
@extends('layout')

@section('title',"Usuarios")

@section('content')
<div class="actions">
    <!-- <p class="subtitle">Menú</p> -->
    <a href="{{route("hospital.sistema.api")}}" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Descargar Certificado</a>
    <a href="{{route("hospital.sistema.testIndice")}}" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Prueba de carga</a>
</div>
<hr style="opacity: 0.2;">
@endsection
@section('modal')
    @include('components.confirm')
@endsection
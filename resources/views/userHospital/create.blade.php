@extends('layout')

@section('title',"Registrar usuario")

@section('content')
<div class="actions">
    <!-- <p class="subtitle">Menú</p> -->
    <a href="{{route('admin.usuario.index')}}" class="waves-effect waves-light red darken-1 btn"><i class="material-icons left">arrow_back</i>Cancelar registro</a>
</div>
<hr style="opacity: 0.2;">
<div class="data-content">
    <p class="subtitle">Registro</p>
    @include('userHospital._form', ["model"=>$model])
</div>

@endsection
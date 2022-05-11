@extends('layout')

@section('title',"Editar usuario")

@section('content')
    <div class="actions">
        <!-- <p class="subtitle">Menú</p> -->
        <a href="{{url('users')}}" class="waves-effect waves-light red darken-1 btn"><i class="material-icons left">arrow_back</i>Cancelar registro</a>
    </div>
    <hr style="opacity: 0.2;">
    <div class="data-content">
        <p class="subtitle">Actualizar usuario</p>
        @include('user._form', ["model"=>$model])
    </div>

@endsection
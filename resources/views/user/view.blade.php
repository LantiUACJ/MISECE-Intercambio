@extends('layout')

@section('title',"Usuario Detalle")

@section('content')
<div class="actions">
    <!-- <p class="subtitle">Menú</p> -->
    <a href="{{route('hospital.usuario.index')}}" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Regresar</a>

    <a href="{{route("hospital.usuario.edit",$model->id)}}" class="waves-effect waves-light btn" style="margin-left: 1rem;"><i class="material-icons left">edit</i>editar</a>
</div>
<hr style="opacity: 0.2;">
<div class="data-content">
    <p class="subtitle" style="display: flex; align-items: center;"> <i class="material-icons" style="margin-right: 1rem;">assignment_ind</i> Detalle de usuario</p>
    <div class="card user-card">

        <!-- User Data  -->
        <div class="row">
            <div class="col s12 m3 user-field-name">
                Nombre
            </div>
            <div class="col s12 m6">
                {{$model->name}}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 user-field-name">
                Curp
            </div>
            <div class="col s12 m6">
                {{$model->curp}}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 user-field-name">
                Correo
            </div>
            <div class="col s12 m6">
                {{$model->email}}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 user-field-name">
                Nivel de acceso
            </div>
            <div class="col s12 m6">
                {{$model->nombreRol()}}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 user-field-name">
                Fecha de registro
            </div>
            <div class="col s12 m6">
                {{$model->created_at}}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 user-field-name">
                Última actualización
            </div>
            <div class="col s12 m6">
                {{$model->updated_at}}
            </div>
        </div>
    </div>

    <!-- Ends user data -->

</div>

@endsection
@extends('layout')

@section('title',"Usuario Detalle")

@section('content')
    <p><a href="{{url("/users/update/".$model->id)}}" class="btn btn-success">Editar Usuario</a></p>

    <table class="table table-bordered">
        <tr>
            <th>Nombre:</th>
            <td>{{$model->name}}</td>
        </tr>
        <tr>
            <th>Correo Electrónico:</th>
            <td>{{$model->email}}</td>
        </tr>
        <tr>
            <th>Nivel de acceso:</th>
            <td>{{$model->nombreRol()}}</td>
        </tr>
        <tr>
            <th>Fecha de registro:</th>
            <td>{{$model->created_at}}</td>
        </tr>
        <tr>
            <th>Última actualización:</th>
            <td>{{$model->updated_at}}</td>
        </tr>
    </table>

@endsection
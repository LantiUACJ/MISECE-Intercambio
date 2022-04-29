@extends('layout')

@section('title',"Usuarios")

@section('content')
    <h1>Usuarios</h1>
    <p>
        <a href="{{url("/users/create")}}" class="btn btn-success">Registrar usuario</a>
    </p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Correo</th>
            <th>Opciones</th>
        </tr>
        @foreach ($model->items() as $item)
            <tr>
                <th>{{$item->id}}</th>
                <th>{{$item->name}}</th>
                <th>{{$item->nombreRol()}}</th>
                <th>{{$item->email}}</th>
                <th>
                    <a href="{{url("/users/view/".$item->id)}}" class="btn btn-primary">Detalle</a>
                    <a href="{{url("/users/update/".$item->id)}}" class="btn btn-warning">Editar</a>
                    <div class="btn btn-danger" onclick="confirmModal('¿Borrar registro?','{{url('/users/delete/'.$item->id)}}')">Borrar</div>
                </th>
            </tr>
        @endforeach
    </table>

    {{$model->links()}}
@endsection
@section('modal')
    @include('components.confirm')
@endsection
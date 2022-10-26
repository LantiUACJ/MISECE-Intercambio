@extends('layout')

@section('content')
    <h1>Detalle</h1>
    <a class="btn btn-warning" href="{{route('admin.hospital.edit', $model->id)}}">Editar</a>
    <div class="btn btn-danger" onclick="confirmModal('¿Borrar hospital?','{{route('admin.hospital.destroy', $model->id)}}')">Borrar</div>

    <table class="table">
        <tr>
            <th>Usuario</th>
            <th>Punto de acceso (URL)</th>
        </tr>
        <tr>
            <td>{{$model->user}}</td>
            <td>{{$model->url}}</td>
        </tr>
    </table>
    

@endsection

@section('script')
    @include('components.confirm')
@endsection
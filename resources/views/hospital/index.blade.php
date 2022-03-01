@extends('layout')

@section('content')
    <h1>Hospital</h1>
    <a class="btn btn-success" href="{{url('/hospital/create/')}}">Registrar</a>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <th>Endpoit:</th>
            <th>Opciones:</th>
        </tr>
        @foreach ($hospitales as $hospital)
            <tr>
                <td>{{$hospital->user}}</td>
                <td>{{$hospital->url}}</td>
                <td>
                    <a class="btn btn-warning" href="{{url('/hospital/update/'.$hospital->id)}}">Editar</a>
                    <div class="btn btn-danger" onclick="confirmModal('¿Borrar hospital?','{{url('/hospital/delete/'.$hospital->id)}}')">Borrar</div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection


@section('script')
    @include('components.confirm')
@endsection


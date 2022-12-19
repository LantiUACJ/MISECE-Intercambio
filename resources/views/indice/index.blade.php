@extends('layout')

@section('content')
    <h1>Índice</h1>
    
    <table class="table">
        <tr>
            <th>CURP:</th>
            <th>Teléfono:</th>
            <th>Hospital:</th>
        </tr>
        @foreach ($model as $indice)
            <tr>
                <td>{{$indice->curp}}</td>
                <td>{{$indice->telefono}}</td>
                <td>
                    @foreach ($indice->hospitales as $hospitalIndice)
                        <div class="row">
                            <div class="col s6">
                                {{$hospitalIndice->hospital->user}}
                            </div>
                            <div class="col s6">
                                <div class="btn btn-danger" onclick="confirmModal('¿Borrar indice?','{{url('/indice/delete/'.$indice->id)}}')">Borrar</div>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
@endsection


@section('script')
    @include('components.confirm')
@endsection


@extends('layout')

@section('content')
    
    <div class="actions">
        <p class="subtitle">Menú</p>
        <a href="{{url('/hospital/create/')}}" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Registrar nueva institución</a>
    </div>
    <hr style="opacity: 0.2;">
    <div class="data-content">
        <p class="subtitle">Datos</p>
        <table class="striped responsive-table dashboard-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Endpoint</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitales as $hospital)
                    <tr>
                        <td>{{$hospital->user}}</td>
                        <td>{{$hospital->url}}</td>
                        <td class="action-btns">
                            <a class="" href="{{url('/hospital/update/'.$hospital->id)}}">
                                <span class="table-btn">
                                    <i class="material-icons">edit</i>
                                </span>
                            </a>
                            <div class="" onclick="confirmModal('¿Borrar hospital?','{{url('/hospital/delete/'.$hospital->id)}}')">
                                <span class="table-btn delete-icon">
                                    <i class="material-icons">delete</i>
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
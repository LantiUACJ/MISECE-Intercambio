@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card blue lighten-3">
                    <div class="card-content white-text blue">
                        <span class="card-title">Datos {{$log->id}}</span>
                    </div>
                    <div class="card-action">
                        <ul class='list-group'>
                            <li class='list-group-item'> <b>consultor: </b>{{$log->consultor}}</li>
                            <li class='list-group-item'> <b>fecha: </b>{{$log->fecha}}</li>
                            <li class='list-group-item'> <b>hospital: </b>{{$log->hospital}}</li>
                            <li class='list-group-item'> <b>paciente: </b>{{$log->paciente}}</li>
                            <li class='list-group-item'> <b>respuestas: </b>{{$log->respuestas}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
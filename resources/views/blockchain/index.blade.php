@extends('layout')

@section('content')
    <form action="" method="get">
        <div class="row">
            <div class="input-field col s4 m6">
                <input id="name" type="text" class="validate" name="fecha" value="{{$filtros->input('fecha','')}}">
                <label for="name">Fecha</label>
            </div>
            <div class="input-field col s4 m6">
                <input id="curp" type="text" class="validate" name="paciente" value="{{$filtros->input('paciente','')}}">
                <label for="curp">Paciente</label>
            </div>
            <div class="input-field col s4 m6">
                <input id="curp" type="text" class="validate" name="hospital" value="{{$filtros->input('hospital','')}}">
                <label for="curp">Hospital</label>
            </div>
            <div class="input-field col s4 m6">
                <input id="curp" type="text" class="validate" name="consultor" value="{{$filtros->input('consultor','')}}">
                <label for="curp">Consultor</label>
            </div>
            <div class="input-field col s4 m6">
                <input id="curp" type="text" class="validate" name="respuestas" value="{{$filtros->input('respuestas','')}}">
                <label for="curp">Respuestas</label>
            </div>
        </div>
        <button type="submit" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">search</i>Buscar</button>
    </form>

    <p class="subtitle">Datos</p>

    <table class="striped responsive-table dashboard-table">
        <thead class="main-row">
          <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Paciente</th>
              <th>Hospital</th>
              <th>Consultor</th>
              <th>Respuestas</th>
              <th class="action-users">Opciones</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($model->items() as $item)
                <tr>
                <!-- DATA -->
                    
                    <th>{{$item->id}}</th>
                    <th>{{$item->fecha}}</th>
                    <th>{{$item->paciente}}</th>
                    <th>{{$item->hospital}}</th>
                    <th>{{$item->consultor}}</th>
                    <th>{{$item->respuestas}}</th>
                    
                <!-- DATA -->

                    <td class="action-users">
                        <a data-position="top" class="tooltipped waves-effect waves-light btn" data-tooltip="{{$item->txhash}}"><i class="material-icons left">verified_user</i>TxHash</a>
                        <a data-position="top" href="{{"http://34.231.12.123:8080/tx/".$item->txhash}}" class="tooltipped waves-effect waves-light btn" data-tooltip="consultar en blockchain"><i class="material-icons left">insert_link</i>Blockchain</a>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
    </table>

    {{$model->links('components.paginatorMaterialize')}}
@endsection
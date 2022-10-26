@extends('layout')
@section('content')
    <div class="actions">
        <p class="subtitle">Menú</p>
        <a href="{{route('admin.hospital.index')}}" class="waves-effect waves-light red darken-1 btn"><i class="material-icons left">arrow_back</i>Cancelar actualización</a>
    </div>
    <hr style="opacity: 0.2;">
    <div class="data-content">
        <p class="subtitle">Actualización</p>

        <div class="row">
            @include('hospital._form',["model"=>$model])
        </div>
    </div>
@endsection
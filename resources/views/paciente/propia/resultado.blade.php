@extends('layout')

@section('head')
    @include('_pdfCss')
@endsection

@section('content')
    <div class="actions">
        <!-- <p class="subtitle">Menú</p> -->
        <a href="{{url('/')}}" class="waves-effect waves-light red darken-1 btn"><i class="material-icons left">exit_to_app
        </i>Cerrar consulta</a>
    </div>
    <hr style="opacity: 0.2;">
    <div class="data-content">
        <p style="display: flex; align-items: center;" class="subtitle"><i class="material-icons" style="margin-right: 1rem;">account_circle
        </i>  Consulta de información de pacientes</p> 
        <div class="row simple-form">
            <div class="col s12">
                <p>Estás viendo tú información <b>{{$nombre}}</b></p>
            </div>
            <div class="col s12">
                <div class="file-container">
                    <div class="pdf">
                        {!! $data !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
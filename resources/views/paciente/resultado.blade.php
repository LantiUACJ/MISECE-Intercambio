@extends('layout')

@section('head')
    <style>
        .bloque{
            margin-bottom: 10px;
            /*background-color: rgba(0,0,0,0.2);*/
        }
        div{
            word-wrap: break-word;
        }
        .pdf *.row{
            border: 1px solid black;
            width: 100%;
        }
        .patient{
            background-color: rgb(255, 236, 236) !important;
            border: 1px solid black;
        }
        .encounter{
            background-color: rgb(202, 202, 202) !important;
            border: 1px solid black;
        }
        .observation{
            background-color: rgb(209, 247, 165) !important;
            border: 1px solid black;
        }
        .medicationAdmin{
            background-color: #68d4d8 !important;
            border: 1px solid black;
        }
        .diagnosticReport{
            background-color: #abddab !important;
            border: 1px solid black;
        }
        .imagingStudy{
            background-color: #caaef7 !important;
            border: 1px solid black;
        }
        .medication{
            background-color: #dbee87 !important;
            border: 1px solid black;
        }
        .organization{
            background-color: #57aeff !important;
            border: 1px solid black;
        }
        .practitioner{
            background-color: #80a389 !important;
            border: 1px solid black;
        }
        .procedure{
            background-color: #d3bfda !important;
            border: 1px solid black;
        }
        .col .row {
            margin-left: 0rem !important;
            margin-right: 0rem !important;
        }
    </style>
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
                <p>Estás viendo la información de salud básica de <b>{{$nombre}}</b></p>
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
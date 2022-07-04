@extends('layout')

@section('head')
    <link rel="stylesheet" href="{{asset('style.css')}}">
@endsection

@section('content')
    <div class="container text-center mt-5">
        <h1 class="titulo">
            <img src="{{asset('Logo_Lanti_Plain.svg')}}" alt="LaNTI_Logo" style="height:80px;" class="pb-2"></a> Block Explorer
        </h1>
        <h4 class="subtitulo">
            Explorador de bloques Ethereum. <span style="color: rgb(43, 90, 177);">Laboratorio Nacional de Tecnologías de Información</span>
        </h4>
        <div class="gris mt-5 mb-3">
            <b>ÚLTIMOS 20 BLOQUES </b>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">TxHash</th>
                    <th scope="col">Block #</th>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Gas Used</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <ul class="pagination" id="pages">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li><a href="{{url('blockchain')}}?page=1">First</a></li>
    </ul>
    <div id="template_page" class="hide">
        <li class="waves-effect __ACTIVE__"><a href="__URL__">__NUMBER__</a></li>
    </div>
    <div id="template_next" class="hide">
        <li class="waves-effect __ACTIVE__"><a href="__URL__"><i class="material-icons">chevron_right</i></a></li>
    </div>
    <div id="template_last" class="hide">
        <li class="waves-effect"><a href="__URL__">__NUMBER__</a></li>
    </div>
@endsection


@section('scripts')
    <script>
        url_template = "{{url('blockchain/details')}}";
        const url = "{{url('blockchain')}}";
        const rpc = "{{env('URL_BLOCKCHAIN')}}";
        const page = {{$page}};
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>    
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <script src="{{asset('formatters.js')}}"></script>
    <script src="{{asset('bloques.js')}}"></script>
@endsection
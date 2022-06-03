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
@endsection

@section('scripts')
    <script>
        url_template = "{{url('blockchain/details')}}";
        const rpc = "{{env('URL_BLOCKCHAIN')}}";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>    
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <script src="{{asset('formatters.js')}}"></script>
    <script src="{{asset('bloques.js')}}"></script>
@endsection
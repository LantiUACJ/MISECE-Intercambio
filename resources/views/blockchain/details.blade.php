@extends('layout')

@section('head')
    <link rel="stylesheet" href="{{asset('style.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="card border-info mt-5">
            
            <div class="card-header">
                Block Hash <span id="blockHash"></span>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item"> Block Number: <span id="blockNumber"></span> </li>
                    <div id="txData"></div>
                </ul>
            </div>
        </div>
    </div>
    <div class="hide" id="template">
        <div class="row">
            <div class="col s12">
              <div class="card blue lighten-4">
                    <div class="card-content white-text blue">
                        <span class="card-title">Transacción #__transaction__</span>
                        <div>Hash de transacción: __t_hash__</div>
                    </div>
                    <div class="card-action">
                        <ul class='list-group'>
                            <li class='list-group-item'> <b>consultor: </b>__consultor__</li>
                            <li class='list-group-item'> <b>fecha: </b>__fecha__</li>
                            <li class='list-group-item'> <b>hospital: </b>__hospital__</li>
                            <li class='list-group-item'> <b>paciente: </b>__paciente__</li>
                            <li class='list-group-item'> <b>respuestas: </b>__respuesta__</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="{{asset('tx_details.js')}}"></script>
@endsection
@extends('layout')
@section('title',"Testing")

@section('content')
    <h1>Resultados de consulta:</h1>
    @if ($data)
        <?php $correctos = 0; $incorrectos = 0; $nombre = 0; $telefono = 0; $email=0; ?>
        @foreach ($data as $elemento)
            @if(isset($elemento->telefono) && isset($elemento->nombre) && isset($elemento->email))
                <?php $correctos++; ?>
            @else
                <?php $incorrectos ?>
            @endif

            @if(!isset($elemento->telefono))
                <?php $telefono++; ?>
            @endif
            @if(!isset($elemento->nombre))
                <?php $nombre++; ?>
            @endif
            @if(!isset($elemento->email))
                <?php $email++; ?>
            @endif
        @endforeach
        <p>
            Se encontraron un total de <b>{{sizeof($data)}} pacientes</b> dentro del la fecha "{{$fecha}}" en adelante. 
            De los pacientes encontrados hay un total de <b class="green-text text-darken-2">{{$correctos}} pacientes</b> que se pueden registrar y <b class="red-text text-darken-2">{{$incorrectos}} pacientes</b> de los cuales no se pueden registrar.
            <br> Este proceso tardo <b>{{$tiempo}} segundos</b>.
        </p>
    
        @if ($incorrectos)
            <p>De los {{$incorrectos}}, fueron rechazados por: 
                <br>{{$nombre}} No tener nombre.
                <br>{{$telefono}} No tener telefono.
                <br>{{$email}} No tener email.
            </p>
        @endif
    @else
        <h3>No se encontraron datos</h3>
        <p><strong>Recomendación</strong> Verifique que la ruta registrada en el sistema sea la adecuada.</p>
    @endif
@endsection

@section('modal')
    @include('components.confirm')
@endsection
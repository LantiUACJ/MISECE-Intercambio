@extends('layout')

@section('content')
    <h1>Consultar expediente:</h1>
    <form action="" method="POST">
        @csrf

        <div class="form-group">
            <label for="curp">CURP</label>
            <input type="text" name="curp" id="curp" class="form-control" placeholder="" aria-describedby="curp_help_id" value="{{$curp}}">
        </div>

        @if ($codigo)
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="" aria-describedby="codigo_help_id" value="{{$codigo==1?"":$codigo}}">
            </div>
        @endif

        <input type="submit" class="btn btn-success" value="Consultar">
    </form>

    <iframe frameborder="0" scrolling="auto" width="100%" height="800px" src="@if (isset($data)){!! "data:text/html;base64," . base64_encode($data) !!}@endif">
        
    </iframe>

@endsection
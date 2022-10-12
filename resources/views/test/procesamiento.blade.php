@extends('layout')
@section('title',"Testing")

@section('content')
    <h1>Respuesta del módulo de procesamiento</h1>

    {{json_encode($respuesta)}}

@endsection

@section('modal')
    @include('components.confirm')
@endsection
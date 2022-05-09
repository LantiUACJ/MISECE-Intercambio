@extends('layout')

@section('title',"Registrar usuario")

@section('content')
    <h1>Registrar usuario</h1>
    
    @include('components.form',["action"=>url("/users/create"), "method"=>"post", "inputs"=>$inputs])

@endsection
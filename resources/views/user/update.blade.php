@extends('layout')

@section('title',"Editar usuario")

@section('content')
    <h1>Actualizar usuarios</h1>
    
    @include('components.form',["action"=>url("/users/update/".$model->id), "method"=>"post", "inputs"=>$model->updateFormColumns()])

@endsection
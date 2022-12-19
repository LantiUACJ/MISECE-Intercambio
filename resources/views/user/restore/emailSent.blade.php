@extends('simpleLayout')

@section('title',"Registrar usuario")

@section('content')
    @include('components.errors')
    
    <div class="alert alert-success" role="alert">
        <strong>Correo enviado</strong>, se ha enviado un correo con un enlace de recuperación de contraseña.
    </div>

@endsection
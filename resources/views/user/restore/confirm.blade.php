@extends('simpleLayout')

@section('content')

    @include('components.errors')
    
    <div class="alert alert-success" role="alert">
        <strong>ÉXITO</strong> ahora puede iniciar sesión con su nueva contraseña. <a href="{{url("login")}}">Click aquí para iniciar sesión.</a>
    </div>

@endsection
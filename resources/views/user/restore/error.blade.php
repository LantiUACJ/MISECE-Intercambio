@extends('simpleLayout')

@section('content')

    @include('components.errors')
    
    <div class="alert alert-danger" role="alert">
        <strong>ERROR</strong>. El código de recuperación de contraseña ha caducado o no es válido.
    </div>

@endsection
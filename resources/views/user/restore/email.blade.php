@extends('simpleLayout')

@section('content')

    @include('components.errors')
    
    <div class="alert alert-info" role="alert">
        <strong>Instrucciones:</strong>
        <ul>
            <li>Introducir correo</li>
            <li>Oprimir enviar</li>
            <li>Esperar correo de confirmación</li>
            <li>Seleccionar el enlace de recuperar contraseña en el correo enviado</li>
            <li>Introducir contraseña nueva</li>
            <li>Oprimir guardar</li>
        </ul>
    </div>
    
    <form method="post">

        @csrf
        @include('components.input',["field"=>"email","label"=>"Correo","value"=>"", "type"=>"email", "required"=>true])

        <input type="submit" name="" value="Enviar" class="btn btn-success">
    </form>

@endsection
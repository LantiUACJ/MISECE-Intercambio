@extends('simpleLayout')

@section('title', "Usuarios")

@section('content')

    @include('components.errors')

    <form method="post">
        @csrf

        <div class="form">
            <div class="input">
                <input type="password" placeholder="Contraseña" name="password">
            </div>
            <div class="input">
                <input type="password" placeholder="repetir Contraseña" name="repeat_password">
            </div>
        </div>

        <input type="submit" name="" value="Guardar" class="btn btn-success">
    </form>

@endsection
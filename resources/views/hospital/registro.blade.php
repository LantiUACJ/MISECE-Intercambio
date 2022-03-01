@extends('layout')

@section('content')
    <h1>Registrar</h1>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="user">Usuario</label>
            <input type="text" name="user" id="user" class="form-control" placeholder="" aria-describedby="user_help_id">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="password_help_id">
        </div>
        <div class="form-group">
            <label for="user">Punto de acceso (URL)</label>
            <input type="text" name="url" id="user" class="form-control" placeholder="" aria-describedby="user_help_id">
        </div>

        <input type="submit" class="btn btn-success" value="Guardar">
    </form>
@endsection
@extends('layout')

@section('content')
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="user">Usuario</label>
            <input type="text" name="email" id="user" class="form-control" placeholder="" aria-describedby="user_help_id">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="password_help_id">
        </div>

        <input type="submit" class="btn btn-success" value="Login">
    </form>
@endsection
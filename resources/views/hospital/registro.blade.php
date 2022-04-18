@extends('layout')

@section('content')
    <h1>Registrar</h1>
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="user">Usuario</label>
            <input type="text" name="user" id="user" class="form-control" placeholder="" aria-describedby="user_help_id" value="{{old("user")}}">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="password_help_id" value="{{old("password")}}">
        </div>
        <div class="form-group">
            <label for="user">Punto de acceso (URL)</label>
            <input type="text" name="url" id="user" class="form-control" placeholder="" aria-describedby="user_help_id" value="{{old("url")}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre del hospital/clinica</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="nombre_help_id" value="{{old("nombre")}}">
        </div>
        <div class="form-group">
            <label for="telefono">Télefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="" aria-describedby="telefono_help_id" value="{{old("telefono")}}">
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="" aria-describedby="email_help_id" value="{{old("email")}}">
        </div>

        <div class="form-group">
            <label for="calle">Calle</label>
            <input type="text" name="calle" id="calle" class="form-control" placeholder="" aria-describedby="calle_help_id" value="{{old("calle")}}">
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" placeholder="" aria-describedby="numero_help_id" value="{{old("numero")}}">
        </div>
        <div class="form-group">
            <label for="colonia">Colonia</label>
            <input type="text" name="colonia" id="colonia" class="form-control" placeholder="" aria-describedby="colonia_help_id" value="{{old("colonia")}}">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código postal</label>
            <input type="text" name="codigo_postal" id="codigo_postal" class="form-control" placeholder="" aria-describedby="codigo_postal_help_id" value="{{old("codigo_postal")}}">
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="" aria-describedby="ciudad_help_id" value="{{old("ciudad")}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" placeholder="" aria-describedby="estado_help_id" value="{{old("estado")}}">
        </div>

        <input type="submit" class="btn btn-success" value="Guardar">
    </form>
@endsection
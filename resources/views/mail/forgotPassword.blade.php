<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuarios sin rol</title>
    </head>
    <body>
        <h1>Recuperar contraseña</h1>

        <p> 
            C. {{$user->name}}:<br>

            Se envía este correo para recuperar contraseña, para recuperar la contraseña <a href="{{Request::root()}}/user/forgot/password/{{$user->remember_token}}">click aquí</a> (el enlace caduca en 15 minutos). <br>En caso de no haber solicitado el cambio de contraseña ignorar el correo.
        </p>
    </body>
</html>
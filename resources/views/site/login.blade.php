<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECE</title>

    <!-- Material -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="{{asset('styles.css')}}">
</head>
<body class="login-bg">
    <div class=" box">
        <div class="row fh">
            <div class="col s12 m6 fh center left-panel">
                <div class="login-logo">
                    <img src="{{asset('logobm.png')}}">
                </div>
            </div>
            <div class="col s12 m6 fh card-padding ">
                <div class="white-card login-card fh center">
                    <div class="login-content">
                        <form action="" id="login" method="POST">
                            @csrf
                            <div class="row">
                                <h4 class="bold">¡Bienvenido!</h4>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="form">
                                        <div class="input">
                                            <input type="email" placeholder="Correo Electrónico" name="email">
                                        </div>
                                        <div class="input">
                                            <input type="password" placeholder="Contraseña" name="password">
                                        </div>
                                    </div>
                                    <div class="bottom-form">
                                        <a href="#modal1" class="forgot-text right modal-trigger">Olvidé mi contraseña</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="submit center">
                                    <a class="waves-effect waves-light btn" onclick="$('#login').submit();">Iniciar sesión</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal small-modal">
        <div class="modal-content">
            <div class="row">
                <h4>Recuperar contraseña</h4>
                <p>Ingresa el correo electrónico para recuperar tu contraseña.</p>
                <div class="input">
                    <input class="no-pad" type="email" placeholder="Ingresa tu correo electrónico">
                </div>
            </div>
        </div>
        <div class="modal-footer center">
        <a href="#!" class="modal-close waves-effect waves-green btn">Enviar</a>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
        });
    </script>

</body>
</html>
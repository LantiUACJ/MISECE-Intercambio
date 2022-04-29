<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MISECE</title>
        <!-- Material -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('styles.css')}}">
    </head>
    <body class="bg-dashboard">
        <div class="box">
            <div class="row fh nomargin">
                <div class="col s3 fh nopad">
                    <div class="sidebar-container fh">
                        <div class="sidebar fh">
                            <div class="parent">
                                <div class="top">
                                    <div class="menu-logo">
                                        <img class="menu-logo" src="{{asset('logobm.png')}}" alt="">
                                    </div>
                                    <div class="menu-items">
                                        <a href="{{url('/')}}" class="{{ request()->is('/') ? "active" : null }}">Inicio</a>
                                        <a href="{{url('/hospital')}}" class="{{ request()->is('hospital/*')||request()->is('hospital') ? 'active' : null }}">Hospitales</a>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="menu-footer">
                                        <p><a href="{{url('logout')}}">Cerrar sesión</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s9 fh data-panel">
                    <div class="data-container">
                        <div class="data-header">
                            <div class="box">
                                <div class="row">
                                    <div class="col s11">
                                        <p class="header-text">¡Bienvenido, <b>{{auth()->user()->name}}!</b> </p>
                                    </div>
                                    <div class="col s1">
                                        <img class="profile-img" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="opacity: 0.2;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
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
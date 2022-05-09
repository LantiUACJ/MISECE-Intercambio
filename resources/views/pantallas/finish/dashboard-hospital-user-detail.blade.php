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


    <link rel="stylesheet" href="{{asset('styles.css')}}?v=1.0.0.1">
</head>
<body class="bg-dashboard">
    <div class="menu-mobile-toggle" onclick="toggleMenu()">
        <i class="material-icons">menu</i> <span>Menú</span>
    </div>
    <div class="menu-bg" id="menubg"></div>

    <div class="box">
        <div class="row fh nomargin">
            <div class="col m12 l3 fh nopad sidebar-wrapper" id="menusidebar">
                <div class="sidebar-container fh">
                    <div class="sidebar fh">
                        <div class="parent">
                            <div class="top">
                                <div class="menu-logo">
                                    <img class="menu-logo" src="logomisece.jpg" alt="">
                                </div>
                                <div class="menu-items">
                                  <a href="dashboard-hospital-inicio.html">Inicio</a>
                                  <a href="dashboard-hospital-users.html" class="active">Usuarios</a>
                                    <!-- a href="#">Pacientes</a -->
                                </div>

                            </div>
                            <div class="bottom">
                                <div class="menu-footer">
                                    <a href="landing.html">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col m12 l9 fh data-panel">
                <div class="data-container">
                    <div class="data-header">
                        <div class="box">
                            <div class="row">
                                <div class="col s9 m11">
                                    <p class="header-text">¡Bienvenido, <b>Hospital Ángeles!</b> </p>
                                </div>
                                <div class="col s3 m1">
                                    <img class="profile-img" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="opacity: 0.2;">
                    <div class="actions">
                        <!-- <p class="subtitle">Menú</p> -->
                        <a href="dashboard-hospital-users.html" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Regresar</a>

                        <a href="dashboard-hospital-user-registro.html" class="waves-effect waves-light btn" style="margin-left: 1rem;"><i class="material-icons left">edit</i>editar</a>
                    </div>
                    <hr style="opacity: 0.2;">
                    <div class="data-content">
                        <p class="subtitle" style="display: flex; align-items: center;"> <i class="material-icons" style="margin-right: 1rem;">assignment_ind</i> Detalle de usuario</p>
                        <div class="card user-card">

                            <!-- User Data  -->
                            <div class="row">
                                <div class="col s12 m3 user-field-name">
                                    Nombre
                                </div>
                                <div class="col s12 m6">
                                    Marco Antonio Robledo
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3 user-field-name">
                                    Correo
                                </div>
                                <div class="col s12 m6">
                                    marcoanotnio@gmail.com
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3 user-field-name">
                                    Nivel de acceso
                                </div>
                                <div class="col s12 m6">
                                    Médico
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3 user-field-name">
                                    Fecha de registro
                                </div>
                                <div class="col s12 m6">
                                    2002-10-10
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3 user-field-name">
                                    Última actualización
                                </div>
                                <div class="col s12 m6">
                                    2002-10-10
                                </div>
                            </div>
                        </div>

                        <!-- Ends user data -->

                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal small-modal">
            <div class="modal-content">
                <div class="row">
                    <h4>Guardado con éxito</h4>
                    <p>Se ha guardado un nuevo registro de hospital.</p>
                </div>
            </div>
            <div class="modal-footer center">
            <a href="dashboard-admin-hospital.html" class="modal-close waves-effect waves-green btn">Cerrar</a>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
        </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sele = document.querySelectorAll('select');
            var instance = M.FormSelect.init(sele);
          });

        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, {dismissible: false});
        });
        function toggleMenu() {
            var element = document.getElementById("menusidebar");
            element.classList.toggle("showmenu");
            var elementtwo = document.getElementById("menubg");
            elementtwo.classList.toggle("showbg");
        }
    </script>

</body>
</html>
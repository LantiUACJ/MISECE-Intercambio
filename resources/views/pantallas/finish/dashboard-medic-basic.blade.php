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
                                    <a class="vcenter" href="dashboard-medic-inicio.html">
                                        <i class="material-icons">home</i>
                                        Inicio</a>
                                    <a class="vcenter active" href="dashboard-medic-basic.html">
                                        <i class="material-icons">search</i>
                                        Consulta básica</a>
                                    <a class="vcenter" href="dashboard-medic-fullfile.html">
                                        <i class="material-icons">find_in_page</i>
                                        Consulta expediente</a>
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
                                    <p class="header-text">¡Bienvenido, <b>Doctor Armendariz!</b> </p>
                                </div>
                                <div class="col s3 m1">
                                    <img class="profile-img" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="opacity: 0.2;">
                    <div class="data-content">
                        <p style="display: flex; align-items: center;" class="subtitle"><i class="material-icons" style="margin-right: 1rem;">account_circle
                        </i>  Consulta de información básica de pacientes</p>
                        <div class="row simple-form">
                            <form class="col s12">
                              <div class="row">
                                <div class="input-field col s6">
                                  <input placeholder="Ingresa CURP del paciente" id="curp" type="text" class="validate">
                                  <label for="curp">CURP</label>
                                </div>
                              </div>
                              <a href="dashboard-medic-basic-file.html" class="waves-effect waves-light btn modal-trigger">
                                <i class="material-icons left">search</i>Consultar</a>

                            </form>
                          </div>
                    </div>
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
        function toggleMenu() {
            var element = document.getElementById("menusidebar");
            element.classList.toggle("showmenu");
            var elementtwo = document.getElementById("menubg");
            elementtwo.classList.toggle("showbg");
        }
    </script>

</body>
</html>
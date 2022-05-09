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
                                    <a href="dashboard-admin-inicio.html">Inicio</a>
                                    <a href="dashboard-admin-hospital.html" class="active">Hospitales</a>
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
                                    <p class="header-text">¡Bienvenido, <b>Admin!</b> </p>
                                </div>
                                <div class="col s3 m1">
                                    <img class="profile-img" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="opacity: 0.2;">
                    <div class="actions">
                        <p class="subtitle">Menú</p>
                        <a href="dashboard-admin-hospital.html" class="waves-effect waves-light red darken-1 btn"><i class="material-icons left">arrow_back</i>Cancelar registro</a>
                    </div>
                    <hr style="opacity: 0.2;">
                    <div class="data-content">
                        <p class="subtitle">Registro</p>

                        <div class="row">
                            <form class="col s12">
                              <div class="row">
                                <div class="input-field col s12 m6">
                                  <input id="user" type="text" class="validate">
                                  <label for="user">Usuario</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="password" type="password" class="validate">
                                    <label for="password">Contraseña</label>

                                    <!-- If error -->
                                    <!-- <span class="error-text">Contraseña Incorrecta</span> -->

                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                    <input id="acces_point" type="text" class="validate">
                                    <label for="acces_point">Punto de acceso (URL)</label>
                                </div>
                              </div>

                              <div class="row">
                                <div class="input-field col s12 m6">
                                  <input id="hospital_name" type="text" class="validate">
                                  <label for="hospital_name">Nombre del Hospital / clínica</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="hospital_phone" type="text" class="validate">
                                  <label for="hospital_phone">Teléfono</label>
                                </div>
                              </div>

                              <div class="row">
                                <div class="input-field col s12 m6">
                                  <input id="email" type="email" class="validate">
                                  <label for="email">Email</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="street_name" type="text" class="validate">
                                    <label for="street_name">Calle</label>
                                  </div>
                                  <div class="input-field col s2">
                                    <input id="adress_number" type="text" class="validate">
                                    <label for="adress_number">Número</label>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="input-field col s12 m6">
                                  <input id="adress_colony" type="text" class="validate">
                                  <label for="adress_colony">Colonia</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="zip_code" type="text" class="validate">
                                  <label for="zip_code">Código Postal</label>
                                </div>
                              </div>


                              <div class="row">
                                <div class="input-field col s12 m6">
                                  <input id="city" type="text" class="validate">
                                  <label for="city">Ciudad</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input id="state" type="text" class="validate">
                                  <label for="state">Estado</label>
                                  					
                                </div>
                              </div>

                              <button href="#modal1" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">save</i>Guardar</button>

                            </form>
                          </div>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>

    <script>
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
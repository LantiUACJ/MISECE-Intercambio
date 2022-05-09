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
                                    <a href="dashboard-admin-inicio.html" class="active">Inicio</a>
                                    <a href="dashboard-admin-hospital.html">Hospital</a>
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
                                    <p class="header-text">¡Bienvenido, <b>Doctor Armendariz!</b> </p>
                                </div>
                                <div class="col s3 m1">
                                    <img src="https://img.freepik.com/vector-gratis/fondo-personaje-doctor_1270-84.jpg?w=2000" alt="" class="profile-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="opacity: 0.2;">
                    <div class="data-content">
                        <table class="striped responsive-table dashboard-table">
                            <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Cita</th>
                                  <th>Costo</th>
                              </tr>
                            </thead>
                    
                            <tbody>
                              <tr>
                                <td>Alan</td>
                                <td>4 abril 2022</td>
                                <td>$330.87</td>
                                <td>
                                    <span class="table-btn">
                                        <i class="material-icons">add</i>
                                    </span>
                                </td>
                              </tr>
                              <tr>
                                <td>Raúl</td>
                                <td>3 febrero 2022</td>
                                <td>$533.76</td>
                                <td>
                                    <span class="table-btn">
                                        <i class="material-icons">add</i>
                                    </span>
                                </td>
                              </tr>
                              <tr>
                                <td>Jonathan</td>
                                <td>12 marzo 2022</td>
                                <td>$477.00</td>
                                <td>
                                    <span class="table-btn">
                                        <i class="material-icons">remove_red_eye</i>
                                    </span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
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
    </script>

</body>
</html>
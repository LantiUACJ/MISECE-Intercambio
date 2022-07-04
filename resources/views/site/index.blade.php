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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('styles.css')}}">
</head>
<body class="landing-bg">
    <div class="">
        <div class="row nomargin">
            <div class="col s12 m12 center">
                <div class="nav opened-menu">
                    <div class="nav-content">
                        <div class="nav-logo">
                            <img src="{{asset('logomisece.jpg')}}">
                        </div>
                        <div class="nav-list">
                            <a href="#inicio">Inicio </a>
                            <a href="#beneficios">Beneficios </a>
                            <a href="#nosotros">Nosotros </a>
                            <a href="#contacto">Contacto </a>
                            <a id="login" href="{{url('login')}}">Iniciar sesión </a>
                        </div>
                        <div class="nav-icons">
                            <img src="{{asset('concayt.png')}}" alt="">
                            <img src="{{asset('uacj.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="backshadow opened-menu">

                </div>
            </div>
        </div>
        <div class="row nomargin" id="inicio">
            <div class="col s12 m12 center">
                <div class="slider">
                    <div class="slider-content">
                        <div class="slider-card">
                            <h4 class="text-white">Tu información de salud, <br> siempre disponible</h4>
                            <p>Acceso al Expediente Clínico electrónico para instituciones de salud y pacientes en México</p>
                            <div class="login-btns">
                                <div class="login-btn">
                                    <div class="login-btn-con login-btn-1">
                                        <img src="{{asset('icon-medic.png')}}">
                                    </div>
                                    <p class="login-btn-text">Soy Médico</p>
                                    <a href="{{url('login')}}" class="white-btn nomargin">Iniciar sesión</a>
                                </div>

                                <div class="login-btn">
                                    <div class="login-btn-con login-btn-2">
                                        <img src="{{asset('icon-paramedic.png')}}">
                                    </div>
                                    <p class="login-btn-text">Soy Paramédico</p>
                                    <a href="{{url('login')}}" class="white-btn nomargin">Iniciar sesión</a>
                                </div>

                                <div class="login-btn">
                                    <div class="login-btn-con login-btn-3">
                                        <img src="{{asset('icon-patient.png')}}">
                                    </div>
                                    <p class="login-btn-text">Soy Paciente</p>
                                    <a href="{{url('login')}}" class="white-btn nomargin">Iniciar sesión</a>
                                </div>

                                <div class="login-btn">
                                    <div class="login-btn-con login-btn-4">
                                        <img src="{{asset('icon-hospital.png')}}">
                                    </div>
                                    <p class="login-btn-text">Soy Institución de salud</p>
                                    <a href="{{url('login')}}" class="white-btn nomargin">Iniciar sesión</a>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col s12 m12 center">
                <div class="wrapper">

                    <div class="section-three" id="nosotros">
                        <h4 class="section-title">Qué es MISECE</h4>
                        <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div>
                        <p class="subtitle-two">
                            MISECE es la plataforma que permite a personal de salud y pacientes, consultar el expediente clínico electrónico sin importar en donde se encuentre almacenado, utilizando tecnológias que permiten la inter-operabilidad entre los diversos sistemas de información en salud que se utilizan a nivel nacional por instituciones públicas y privadas. 
                        </p>
                        <div class="screenshot-container">
                            <img src="{{asset('ss1.png')}}" alt="">
                        </div>
                        <!-- <div class="tabs-section">
                            <ul id="tabs-swipe-demo" class="tabs">
                                <li class="tab col s3 tab-ele"><a class="active" href="#tab1">Elemento 1</a></li>
                                <li class="tab col s3 tab-ele"><a href="#tab2">Elemento 2</a></li>
                                <li class="tab col s3 tab-ele"><a href="#ttab3">Elemento 3</a></li>
                              </ul>
                              <div id="tab1" class="col s12 tcontent">Elemento 1</div>
                              <div id="tab2" class="col s12 tcontent">Elemento 2</div>
                              <div id="ttab3" class="col s12 tcontent">Elemento 3</div>
                        </div> -->
                    </div>


                    <div class="section-two parallax">
                        <h4 class="section-title text-white text-shadow">Una plataforma única para la salud</h4>
                        <!-- <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div> -->
                        <!-- <p class=" image-text-white">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, rerum aut! Modi odit consequatur ab sequi natus, laboriosam, fugiat debitis rem architecto error facilis ipsa, consequuntur ut porro maiores omnis.
                        </p> -->
                    </div>


                    <div class="section-one" id="beneficios">
                        <h4 class="section-title">Beneficios</h4>
                        <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div>
                        <!-- <p class="subtitle-two">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, rerum aut! Modi odit consequatur ab sequi natus, laboriosam, fugiat debitis rem architecto error facilis ipsa, consequuntur ut porro maiores omnis.
                        </p> -->
                        <div class="benefits-cards">


                            <div class="benefit-card">
                                <p class="bcard-title">Médicos</p>
                                <!-- <div class="bcard-icon">
                                    <i class="material-icons">cloud_queue</i>
                                </div> -->
                                <p class="bcard-text">
                                    • Mejora la atención al paciente <br>
                                    • Toma de decisiones mas informadas y precisas 
                                </p>
                                <!-- <p class="bcard-btn">
                                    Conocer más
                                </p> -->
                            </div>


                            <div class="benefit-card">
                                <p class="bcard-title">Pacientes</p>
                                <!-- <div class="bcard-icon">
                                    <i class="material-icons">important_devices</i>
                                </div> -->
                                <p class="bcard-text">
                                    • Acceso a su información de salud en todo momento <br>
                                    • Portabilidad de expediente clínico electrónico<br>
                                </p>
                                <!-- <p class="bcard-btn">
                                    Conocer más
                                </p> -->
                            </div>


                            <div class="benefit-card">
                                <p class="bcard-title">Paramédicos
                                </p>
                                <!-- <div class="bcard-icon">
                                    <i class="material-icons">fingerprint</i>
                                </div> -->
                                <p class="bcard-text">
                                    • Acceso inmediato a la información vital de pacientes en situación de emergencia
                                </p>
                                <!-- <p class="bcard-btn">
                                    Conocer más
                                </p> -->
                            </div>
                        </div>
                    </div>



                    <div class="section-five" id="contacto">
                        <h4 class="section-title">investigación con impacto social</h4>
                        <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div>
                        <p class="subtitle-two">
                            Plataforma tecnológica desarrollada por la Universidad Autónoma de Ciudad Juárez con financiamiento del Consejo Nacional de Ciencia y Tecnología, bajo el programa FORDECYT-PRONACES.
                        </p>
                        <div class="logos-brief">
                            <img src="{{asset('uacj.png')}}" alt="">
                            <img src="{{asset('concayt.png')}}" alt="">
                        </div>
                    </div>

                    <div class="section-four parallax">
                        <h4 class="section-title text-white text-shadow" style="margin-bottom: 10rem;">Impulsando la salud digital <br> en México</h4>
                        <!-- <div class="title-element">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                        </div> -->
                        <div class=" image-text-white">
                            <div class="row nomargin">
                                <div class="col s12 m4 footer-col">
                                    <p class="footer-title">Mi Salud </p>
                                    <div class="title-element small-element">
                                        <span class="line-one"></span>
                                        <span class="line-two"></span>
                                    </div>
                                    <!-- <p>contacto@misalud.com</p> -->
                                    <div class="footer-logo">
                                        <img src="logomisece.jpg">
                                    </div>
                                </div>
                                <div class="col s12 m4 footer-col">
                                    <p class="footer-title">Contacto</p>
                                    <div class="title-element small-element">
                                        <span class="line-one"></span>
                                        <span class="line-two"></span>
                                    </div>
                                    <p>contacto@misalud.com</p>
                                    <p>Ciudad de México</p>
                                </div>
                                <div class="col s12 m4 footer-col">
                                    <p class="footer-title">Acerca De </p>
                                    <div class="title-element small-element">
                                        <span class="line-one"></span>
                                        <span class="line-two"></span>
                                    </div>
                                    <p>Plataforma Mi Salud, una plataforma única en México para integrar los expedientes clínicos entre hospitales, médicos y pacientes.</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="section-six">
                        <p>© Copyright 2022</p>
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
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>

    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs({
            swipeable : true,
            responsiveThreshold : 1920
            });
        });
    </script>

</body>
</html>
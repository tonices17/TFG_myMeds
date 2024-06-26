<!-- He utilizado elementos (__) para indicar descendientes y modificadores (--) para indicar variaciones del bloque. -->
<!-- No he utilizado un grid ya que pienso que para mi composición no es necesario -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myMeds - Home</title>
    <link rel="stylesheet" href="{{ asset('sass/main.css') }}">
    <link rel="icon" href="{{ asset('assets/logo.png') }}">
    <style>
        /* Estilos adicionales para los elementos de la hamburguesa */
        .nav__menu {
            width: 30px;
            height: 30px;
            cursor: pointer;
            margin-left: auto;
            /* Mueve el icono de hamburguesa hacia el extremo derecho */
        }

        .nav__menu-barra {
            width: 100%;
            height: 4px;
            background-color: #333;
            /* Color de las barras */
            margin: 6px 0;
            transition: 0.4s;
        }

        /* Rotación de las barras para transformar la hamburguesa en una "X" al abrir el menú */
        .nav__menu.abierto .barra1 {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .nav__menu.abierto .barra2 {
            opacity: 0;
        }

        .nav__menu.abierto .barra3 {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        /* Estilo para el menú desplegable */
        .nav__menu-desplegable {
            display: none;
            position: absolute;
            top: 50px;
            /* Ajusta la posición del menú desplegable */
            left: 0;
            width: 100%;
            background-color: #f9f9f9;
            padding: 10px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .nav__menu-desplegable li {
            list-style: none;
            margin-bottom: 10px;
        }

        .nav__menu-desplegable a {
            color: #333;
            text-decoration: none;
            font-size: 2rem;
            font-family: fuentePagina;
        }

        .nav__menu-desplegable a:hover {
            color: #F36A5F;
        }

        /* Media query para dispositivos móviles */
        @media only screen and (max-width: 768px) {
            .nav__lista {
                display: none;
                /* Oculta la lista principal en dispositivos móviles */
            }

            .nav__menu-desplegable {
                display: block;
                z-index: 1;
                margin-top: 2rem;
                text-align: center;
                /* Muestra el menú desplegable en dispositivos móviles */
            }
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="pagina">
            <!-- NAV -->
            <nav class="nav">
                <div class="nav__contenedor flex--row">
                    <a class="nav__logo" href="{{ route('mymeds') }}">
                        <img src="{{ asset('assets/logo.png') }}" alt="pastilla-logo">
                        <span class="nav__logo-letra">myMeds</span>
                    </a>
                    <ul class="nav__lista flex--row">
                        <li class="nav__lista-item">
                            <a href="#caracteristicas">Características</a>
                        </li>
                        <li class="nav__lista-item">
                            <a href="#funciona">Cómo funciona</a>
                        </li>
                        <li class="nav__lista-item">
                            <a href="#contacto">Contacto</a>
                        </li>
                        <li class="nav__lista-item">
                            <a href="{{ route('login') }}" class="nav__login">
                                <img src="{{ asset('assets/login.png') }}" alt="login-user">
                            </a>
                        </li>
                    </ul>
                    <img class="nav__menu" src="{{ asset('assets/menu.png') }}" alt="menu" onclick="toggleMenu()">
                    <!-- Menú desplegable para dispositivos móviles -->
                    <ul class="nav__menu-desplegable" id="menuDesplegable">
                        <li><a href="#caracteristicas">Características</a></li>
                        <li><a href="#funciona">Cómo funciona</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </nav>
            <!-- HEADER -->
            <header class="header">
                <div class="header__contenedor flex--row">
                    <div class="header__columna-1">
                        <div class="header__titulo flex--column">
                            <h1 class="heading--primary">
                                TU SALUD, <br><span class="heading--secondary">EN TUS MANOS</span>
                            </h1>
                            <p class="heading--descripcion">Lleva la toma de tus pastillas de una manera<br> más
                                controlada. ¡No más dudas!
                            </p>
                            <!-- Estos botones llevarán a las paginas de iniciar sesión o de registrarse -->
                            <div class="header__botones flex--row">
                                <a class="btn btn--primary" href="{{ route('login') }}">Iniciar Sesión</a>
                                <a class="btn btn--secondary" href="{{ route('register') }}">Registrarse</a>
                            </div>
                        </div>
                    </div>
                    <div class="header__columna-2">
                        <img class="header__imagen" src="{{ asset('assets/imgHeader.png') }}"
                            alt="persona con medicamentos y un horario">
                    </div>
                </div>
            </header>
            <!-- CUADRO CARACTERISTICAS -->
            <section id="caracteristicas" class="cuadrado">
                <div class="cuadrado__contenedor flex--row">
                    <div class="cuadrado__columna-1 flex--column">
                        <div class="cuadrado__img-columna">
                            <img src="{{ asset('assets/img_columna1.png') }}"
                                alt="cabeza de persona con bombilla iluminada">
                        </div>
                        <div class="cuadrado__titulo-columna">
                            Diseño sencillo
                        </div>
                        <div class="cuadrado__texto-columna">
                            Nuestra interfaz de usuario es sencilla e intuitiva, lo que ayuda a que todo el mundo sepa
                            como
                            utilizarla en todo momento.
                        </div>
                    </div>
                    <div class="cuadrado__columna-2 flex--column">
                        <div class="cuadrado__img-columna">
                            <img src="{{ asset('assets/img_columna2.png') }}"
                                alt="botones que se pueden mover hacia izquierda y derecha">
                        </div>
                        <div class="cuadrado__titulo-columna">
                            Fácil personalización
                        </div>
                        <div class="cuadrado__texto-columna">
                            La aplicación es totalmente personalizable para adaptarse a tus necesidades. Elige el tipo
                            de
                            recordatorio o la forma de las notificaciones.
                        </div>
                    </div>
                    <div class="cuadrado__columna-3 flex--column">
                        <div class="cuadrado__img-columna">
                            <img src="{{ asset('assets/img_columna3.png') }}" alt="simbolo de un escudo con un check">
                        </div>
                        <div class="cuadrado__titulo-columna">
                            Segura
                        </div>
                        <div class="cuadrado__texto-columna">
                            No tengas miedo al registrarte. Nuestra aplicación utiliza la última tecnología de cifrado
                            para
                            proteger tus datos.
                        </div>
                    </div>
                    <!-- He añadido javascript para darle funcionalidad a estas flechas, asi cuando mires la versión movil, 
                    podrás pasar de una característica a otra. -->
                    <div class="cuadrado__flechas">
                        <img class="flecha--prev" src="{{ asset('assets/flecha-correcta.png') }}" alt="">
                        <img class="flecha--next" src="{{ asset('assets/flecha-incorrecta.png') }}" alt="">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- COMO FUNCIONA -->
    <section id="funciona" class="pasos flex--column">
        <div class="pasos__contenedor">
            <h2 class="heading--tertiary">CÓMO<span class="heading--quaternary"> FUNCIONA</span></h2>
            <!-- PUNTO 1 -->
            <div class="pasos__punto flex--row">
                <img src="{{ asset('assets/img_punto1.png') }}" alt="chico con lista y lapiz">
                <div class="pasos__punto-info flex--column">
                    <h3 class="heading--quinary">Regístrate</h3>
                    <p class="pasos__punto-texto">Estamos seguros de que más de una vez se te ha olvidado tomarte la
                        medicación
                        a la hora que te tocaba, o incluso has llegado a dudar si te habías tomado la pastilla o no.
                        Para que esto no te vuelva a pasar, lo primero que tienes que hacer es registrarte en
                        nuestra
                        aplicación.</p>
                </div>
            </div>
            <!-- PUNTO 2 -->
            <div class="pasos__punto flex--row">
                <div class="pasos__punto-info flex--column">
                    <h3 class="heading--quinary">Elige tus medicamentos</h3>
                    <p class="pasos__punto-texto">Una vez te has registrado, es el momento de elegir cuales son los
                        medicamentos que necesitan un seguimiento. Podrás ir añadiendo gracias a un desplegable los
                        medicamentos a tu panel de seguimiento. </p>
                </div>
                <img src="{{ asset('assets/img_punto2.png') }}" alt="móvil con una biblioteca de medicamentos">
            </div>
            <!-- PUNTO 3 -->
            <div class="pasos__punto flex--row">
                <img src="{{ asset('assets/img_punto3.png') }}" alt="médico con un diario de toma de medicamentos">
                <div class="pasos__punto-info flex--column">
                    <h3 class="heading--quinary">Revisa que todo esté correcto</h3>
                    <p class="pasos__punto-texto">Ya tienes guardados todos los medicamentos. Es momento de ver tu
                        diario.
                        Comprueba que todos los medicamentos han sido añadidos y que las horas de las tomas son
                        correctas (puedes modificarlas si lo deseas). Activa las notificaciones y estarás listo para
                        no
                        perderte ninguna toma.</p>
                </div>
            </div>
            <!-- PUNTO 4 -->
            <div class="pasos__punto flex--row">
                <div class="pasos__punto-info flex--column">
                    <h3 class="heading--quinary">Confirma que has tomado tus pastillas</h3>
                    <p class="pasos__punto-texto">¡Acabas de recibir una notificación! Entras en la aplicación y marcas
                        con
                        un
                        check la medicación que te toca tomar en este momento. Ya puedes tener la conciencia
                        tranquila
                        sabiendo con certeza que te la has tomado.</p>
                </div>
                <img src="{{ asset('assets/img_punto4.png') }}"
                    alt="médico con una pastilla y una lista con check verde">
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="contacto" class="footer flex--column">
        <div class="footer__mail flex--column">
            <img src="{{ asset('assets/img_mail.png') }}" alt="simbolo del correo">
            <p>contacto@mymeds.com</p>
        </div>
        <div class="footer__opciones flex--row">
            <div class="footer__columna-1 flex--column">
                <a href="#" class="footer__opcion" style="text-decoration: none">Inicio</a>
                <a href="#" class="footer__opcion" style="text-decoration: none">Contacta con nosotros</a>
            </div>
            <div class="footer__columna-2 flex--column">
                <a href="#funciona" class="footer__opcion" style="text-decoration: none">Como funciona</a>
                <a href="#" class="footer__opcion" style="text-decoration: none">Política de privacidad</a>
            </div>
            <div class="footer__columna-3 flex--column">
                <a href="#" class="footer__opcion" style="text-decoration: none">Términos de uso</a>
                <a href="#" class="footer__opcion" style="text-decoration: none">Cookies</a>
            </div>
        </div>
        <div class="footer__redes flex--column">
            <h4 class="footer__redes-sociales">Redes Sociales</h4>
            <div class="footer__iconos-redes flex--row">
                <!-- Cada imagen llevará a la red social correspondiente -->
                <li class="footer__icono">
                    <a href=""><img src="{{ asset('assets/img_facebook.png') }}" alt="simbolo facebook"
                            class="footer__img-redes"></a>
                </li>
                <li class="footer__icono">
                    <a href=""><img src="{{ asset('assets/img_instagram.png') }}" alt="simbolo instagram"
                            class="footer__img-redes"></a>
                </li>
                <li class="footer__icono">
                    <a href=""><img src="{{ asset('assets/img_twitter.png') }}" alt="simbolo twitter"
                            class="footer__img-redes"></a>
                </li>
                <li class="footer__icono">
                    <a href=""><img src="{{ asset('assets/img_linkedin.png') }}" alt="simbolo linkedin"
                            class="footer__img-redes"></a>
                </li>
            </div>
        </div>
        <div class="footer__derechos">
            <p>2023-2024 myMeds - Todos los derechos reservados</p>
        </div>

    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        // Función para mostrar u ocultar el menú desplegable al hacer clic en el icono de hamburguesa
        function toggleMenu() {
        var menuDesplegable = document.getElementById("menuDesplegable");
        if (menuDesplegable.style.display === "block") {
        menuDesplegable.style.display = "none";
        } else {
        menuDesplegable.style.display = "block";
        }
        }

        document.addEventListener('DOMContentLoaded', function() {
        var menuDesplegable = document.getElementById("menuDesplegable");
        menuDesplegable.style.display = "none";
        });

        document.addEventListener('click', function(event) {
        var menuDesplegable = document.getElementById("menuDesplegable");
        var menuIcono = document.querySelector('.nav__menu');
        if (!menuDesplegable.contains(event.target) && event.target !== menuIcono) {
        menuDesplegable.style.display = "none";
        }
        });
    </script>
</body>

</html>
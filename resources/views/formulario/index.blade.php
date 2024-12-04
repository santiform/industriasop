<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseño Responsive</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
    <div class="hoja">
        <!-- resources/views/layouts/header.blade.php -->

        <header class="header">
            <div class="header-container"> <!-- Nuevo contenedor -->
                <!-- Logo a la izquierda -->
                <div class="logo">
                    <img src="{{ asset('img/logo.webp') }}" alt="Logo" class="logo-img">
                </div>

                <!-- Botones a la derecha -->
                <div class="botones">
                    @if(Auth::check()) <!-- Si el usuario está autenticado -->
                        <a href="{{ route('perfil') }}" class="btn">
                            <i class="fas fa-user"></i> Mi Perfil
                        </a>
                        <a href="{{ route('logout') }}" class="btn">
                            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                        </a>
                    @else <!-- Si el usuario no está autenticado -->
                        <a href="{{ route('login') }}" class="btn">
                            <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}" class="btn">
                            <i class="fas fa-user-plus"></i> Registrar
                        </a>
                    @endif
                </div>

            </div>
        </header>


        <!-- Contenedor Principal (2 Columnas) -->
        <div class="principal">
            <div class="izquierda">Columna Izquierda (30%)</div>
            <div class="derecha">
                Columna Derecha (70%)<br><br><br><br><br><br> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                   
            </div>
        </div>
    </div>

    <!-- Contenedor Footer (3 Columnas) -->
    <footer class="footer">
        <div class="footer-container">
            <div class="izquierda">
                <div class="logo">
                    <img src="{{ asset('img/logo2.webp') }}" width="200px" alt="Logo" class="logo-img">
                </div>
            </div>
            <div class="centro">
                <div>
                    <div>
                        <i class="fas fa-envelope"></i> <!-- Icono de correo -->
                        <span class="texto-footer"><b>correo@ejemplo.com</b></span> <!-- Texto del correo -->
                    </div>  
                    <br> 
                    <div>
                        <i class="fas fa-phone-alt"></i> <!-- Icono de teléfono -->
                        <span class="texto-footer"><b>+123 456 7890</b></span> <!-- Texto del teléfono -->
                    </div>  
                </div>
            </div>
            <div class="derecha">
                <div>
                    <i class="fas fa-map-marker-alt"></i> <!-- Icono de teléfono -->
                    <span class="texto-footer"><b>Dirección 123</b> | Morón, Argentina</span> <!-- Texto del teléfono -->
                </div>
            </div>
        </div>    
    </footer>

    <script type="text/javascript">
        let prevScrollPos = window.pageYOffset;  // Guarda la posición de desplazamiento anterior

        window.onscroll = function() {
            let currentScrollPos = window.pageYOffset;  // Obtiene la posición actual del scroll

            if (prevScrollPos > currentScrollPos) {
                // Si estamos subiendo el scroll, muestra el header
                document.querySelector(".header").classList.remove("hidden");
            } else {
                // Si estamos bajando el scroll, oculta el header
                document.querySelector(".header").classList.add("hidden");
            }

            prevScrollPos = currentScrollPos;  // Actualiza la posición del scroll para el siguiente evento
        };

    </script>

</body>
</html>
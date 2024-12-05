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
                    <a href="">
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo" class="logo-img">
                    </a>
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
            <div class="izquierda">
                <div class="timeline">
                    <div class="paso paso-azul">
                      <div class="circle circle-azul">1</div> Datos básicos
                    </div>
                    <div class="linea linea-azul">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">2</div> Control
                    </div>
                    <div class="linea linea-gris">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">3</div> Puertas
                    </div>
                    <div class="linea linea-gris">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">4</div> Detalles generales
                    </div>
                    <div class="linea linea-gris">|</div>
                    <div class="paso paso-gris">
                        <div class="circle circle-gris">5</div> Confirmación
                    </div>
                </div>
            </div>
            <div class="derecha">
                <div class="formulario">
                  <h2 class="titleSection"><div class="div-paso">1</div> DATOS BÁSICOS</h2>
                  <form action="" method="POST" required>
                    @csrf
                      <div class="titulo-form-group">Empresa</div>
                      <div class="form-group">
                        <label for="nombre">Nombre de empresa</label>
                        <input required  type="text" id="nombre" name="nombre" placeholder="">
                        <div style="height: 1.6rem;" ></div>
                        <label for="email">Email de empresa</label>
                        <input required  type="email" id="email" name="email" placeholder="">
                        <div style="height: 1.6rem;" ></div>
                        <label for="telefono">Teléfono de empresa</label>
                        <input required  type="tel" id="telefono" name="telefono" placeholder="">
                      </div>
                      <div class="titulo-form-group">Obra</div>
                      <div class="form-group">

                        <label for="direccion">Dirección de obra</label>
                        <input required  type="text" id="direccion" name="direccion" placeholder="">

                        <div style="height: 1.6rem;" ></div>

                        <label for="tipo_obra">Tipo de obra</label>
                          <select required  id="tipo_obra" name="tipo_obra">
                              <option value="" disabled selected></option>
                              
                                  <option value=""></option>
                              
                          </select>

                      </div>

                      <div class="titulo-form-group">Ascensor</div>
                      <div class="form-group">
                          <label for="tipo_funcionamiento">Cuadro de maniobras</label>
                          <select required  id="tipo_funcionamiento" name="tipo_funcionamiento">
                              <option value="" disabled selected></option>
                              
                                  <option value=""></option>
                              
                          </select>
                      </div>


                    <div class="botones-container">
                        <div class="boton-izquierdo">
                            
                        </div>

                        <div class="boton-derecho">
                            <div class="btnNext">
                                <button type="submit">Siguiente</button>
                            </div>
                        </div>
                    </div>

                    
                    </form>
                </div>         
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
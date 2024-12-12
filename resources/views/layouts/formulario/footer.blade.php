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
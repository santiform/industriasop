<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario de Accesos</title>
</head>
<body>
    @include('new.includes.header')

    <div class="container">
        <div class="columna izquierda">
            <div class="timeline">
                <div class="paso paso-azul">
                    <div class="circle circle-azul">✔</div> Datos básicos
                </div>
                <div class="linea linea-azul">|</div>
                <div class="paso paso-azul">
                    <div class="circle circle-azul">✔</div> Control
                </div>
                <div class="linea linea-azul">|</div>
                <div class="paso paso-azul">
                    <div class="circle circle-azul">✔</div> Puertas
                </div>
                <div class="linea linea-azul">|</div>
                <div class="paso paso-azul">
                    <div class="circle circle-azul">4</div> Detalles generales
                </div>
                <div class="linea linea-gris">|</div>
                <div class="paso paso-gris">
                    <div class="circle circle-gris">5</div> Confirmación
                </div>
            </div>
        </div>

        <div class="columna derecha">
             <script>
            document.addEventListener('DOMContentLoaded', function() {
    var totalPisosAll = {{ $paradas }};
    var totalSubsuelos = {{ $subsuelos }};
    var totalPisos = totalPisosAll - totalSubsuelos - 1;

    var estadoBotonesMatriz = [];
    var pisosMatriz = [];
    var botonera = document.getElementById('botonera');

    crearEncabezado('A', botonera, true, true);
    crearEncabezado('Pisos', botonera, true, true);
    botonera.appendChild(document.createElement('br'));

    var contadorPisos = 0;

    for (var i = totalPisos; i >= -totalSubsuelos; i--) {
        crearBoton('A', botonera, true, contadorPisos);
        crearBoton(i == 0 ? 'PB' : i, botonera, false, contadorPisos);
        botonera.appendChild(document.createElement('br'));
        estadoBotonesMatriz.push(1); // Inicializamos con 1 (verde)
        pisosMatriz.push(i == 0 ? 'PB' : i);
        contadorPisos++;
    }

    function crearBoton(texto, contenedor, noCambiaColor, indice) {
        var button = document.createElement('button');
        button.type = 'button';
        button.textContent = texto;
        button.classList.add('btn');

        if (texto === 'A') {
            button.classList.add('btn-ascensor');
            button.dataset.indice = indice;
            button.addEventListener('click', function() {
                var indice = parseInt(this.dataset.indice);
                estadoBotonesMatriz[indice] = 1 - estadoBotonesMatriz[indice];
                actualizarColorBotones();
                actualizarInputsHidden();
            });
        }

        contenedor.appendChild(button);

        if (texto !== 'A') {
            button.classList.add('piso');
            button.disabled = true;
        }
    }

    function crearEncabezado(texto, contenedor, noCambiaColor) {
        var button = document.createElement('button');
        button.type = 'button';
        button.textContent = texto;
        button.classList.add('btnEnc');
        if (!noCambiaColor) {
            button.classList.add('btnEncPiso');
        }
        if (texto !== 'A') {
            button.classList.add('btnEncPiso');
        }
        contenedor.appendChild(button);
    }

    function actualizarColorBotones() {
        var botones = botonera.getElementsByClassName('btn');
        for (var i = 0; i < botones.length; i++) {
            var boton = botones[i];
            if (boton.textContent === 'A') {
                var indice = parseInt(boton.dataset.indice);
                var estadoBoton = estadoBotonesMatriz[indice];
                if (estadoBoton === 0) {
                    boton.style.backgroundColor = 'red'; // Rojo cuando es 0
                } else {
                    boton.style.backgroundColor = 'green'; // Verde cuando es 1
                }
            }
        }
    }

    function actualizarInputsHidden() {
        var inputsHidden = document.getElementsByClassName('estadoBotonesInput');
        for (var i = 0; i < estadoBotonesMatriz.length; i++) {
            inputsHidden[i].value = JSON.stringify({
                estado: estadoBotonesMatriz[i],
                piso: pisosMatriz[i]
            });
        }
    }

    for (var i = 0; i < estadoBotonesMatriz.length; i++) {
        var inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.name = 'estadoBotones[]';
        inputHidden.classList.add('estadoBotonesInput');
        botonera.appendChild(inputHidden);
    }

    var formulario = document.getElementById('form_habilitaciones');

    formulario.addEventListener('submit', function(event) {
        var button = document.activeElement;
        if (button && button.type === 'submit') {
            actualizarInputsHidden();
        } else {
            event.preventDefault();
        }
    });

    // Inicializar los colores de los botones al cargar la página
    actualizarColorBotones();
});
  </script>

            
            <h2 class="titleSection"> <div class="div-paso">4</div> Habilitaciones accesos</h2>   

            <form class="formulario" id="form_habilitaciones"  action="{{ route('newPaso10') }}" method="POST" >
                @csrf
                <!-- Este grupo en la BD se guarda en la tabla "pedidos" -->
                <input type="hidden" name="email_empresa" value="{{ htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="nombre_empresa" value="{{ htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="telefono_empresa" value="<?php echo htmlspecialchars($telefono_empresa, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="direccion_obra" value="{{ htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="tipo_obra" value="{{ htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="tipo_funcionamiento" value="{{ htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="tipo_control" value="{{ htmlspecialchars($tipo_control, ENT_QUOTES, 'UTF-8') }}">

                <!-- Este grupo en la BD se guarda en la tabla "motores" -->
                <input type="hidden" name="motor_potencia" value="{{ htmlspecialchars($motor_potencia, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="motor_marca" value="{{ htmlspecialchars($motor_marca, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="motor_voltaje" value="{{ htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="motor_encoder" value="{{ htmlspecialchars($motor_encoder, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="motor_rescate" value="<?php echo htmlspecialchars($motor_rescate, ENT_QUOTES, 'UTF-8'); ?>">

                <!-- Este grupo en la BD se guarda en la tabla "tipos_puertas" -->
                <input type="hidden" name="tipo_puerta" value="{{ htmlspecialchars($tipo_puerta, ENT_QUOTES, 'UTF-8') }}">

                <!-- Este grupo en la BD se guarda en la tabla "detalles_puertas" -->
                <input type="hidden" name="puerta_marca" value="{{ htmlspecialchars($puerta_marca, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="puerta_voltaje" value="{{ htmlspecialchars($puerta_voltaje, ENT_QUOTES, 'UTF-8') }}">
                <input type="hidden" name="patin_retractil" value="<?php echo htmlspecialchars($patin_retractil, ENT_QUOTES, 'UTF-8'); ?>">

                <!-- este grupo en  la bd se guarda en la tabla "accesos" -->
                <input type="hidden" name="accesos" value="<?php echo htmlspecialchars($accesos, ENT_QUOTES, 'UTF-8'); ?>">

                <!-- este grupo en la bd se guarda en la tabla "detalles_generales" -->
                <input type="hidden" name="tipo_botonera" value="<?php echo htmlspecialchars($tipo_botonera, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="paradas" value="<?php echo htmlspecialchars($paradas, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="subsuelos" value="<?php echo htmlspecialchars($subsuelos, ENT_QUOTES, 'UTF-8'); ?>">

                <input type="hidden" name="vista" value="simple">

                <div id="botonera"></div>

                <div class="container">
                    <div class="boton-izquierdo">
                        <div class="btnPrev">
                            <button type="button" onclick="window.history.back()">Anterior</button>
                        </div>
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


    @include('new.includes.footer')

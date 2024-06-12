<?php include '../resources/views/new/includes/header.blade.php'; ?>


<div class="container">

  <div class="columna izquierda"><div class="timeline">

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


    



<div class="">

  <h2 class="titleSection"> <div class="div-paso">4</div> Habilitaciones accesos</h2>  

  <form class="formulario" id="form_habilitaciones" action="{{ route('newPaso10') }}" method="POST">
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_control" value="<?php echo htmlspecialchars($tipo_control, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "motores" -->
    <input type="hidden" name="motor_potencia" value="<?php echo htmlspecialchars($motor_potencia, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_marca" value="<?php echo htmlspecialchars($motor_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_voltaje" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_encoder" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "tipos_puertas" -->
    <input type="hidden" name="tipo_puerta" value="<?php echo htmlspecialchars($tipo_puerta, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "detalles_puertas" -->
    <input type="hidden" name="puerta_marca" value="<?php echo htmlspecialchars($puerta_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="puerta_voltaje" value="<?php echo htmlspecialchars($puerta_voltaje, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "accesos" -->
    <input type="hidden" name="accesos" value="<?php echo htmlspecialchars($accesos, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "detalles_generales" -->
    <input type="hidden" name="tipo_botonera" value="<?php echo htmlspecialchars($tipo_botonera, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="paradas" value="<?php echo htmlspecialchars($paradas, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="subsuelos" value="<?php echo htmlspecialchars($subsuelos, ENT_QUOTES, 'UTF-8'); ?>">

    <input type="hidden" id="datosFormularioInput" name="datosFormulario">

    <div id="botonera" ></div>
  



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

</div>




<script>

    

    var estadoInicialBotones = [];

document.addEventListener('DOMContentLoaded', function() {
    var botones = document.querySelectorAll('button[data-indice]');
    botones.forEach(function(boton) {
        var indice = parseInt(boton.dataset.indice);
        var tipo = boton.dataset.tipo;
        var estadoBoton = {
            salida_a: tipo === 'A' ? 1 : 0,
            salida_b: tipo === 'B' ? 1 : 0
        };
        estadoInicialBotones[indice] = estadoBoton;
    });
});


    document.addEventListener('DOMContentLoaded', function() {
        var totalPisosAll = {{ $paradas ?? 0 }};
        var totalSubsuelos = {{ $subsuelos ?? 0 }};
        var totalPisos = totalPisosAll - totalSubsuelos - 1;

        var estadoBotonesMatriz = [];
        var botonera = document.getElementById('botonera');

        crearEncabezado('A', botonera);
        crearEncabezado('Pisos', botonera);
        crearEncabezado('B', botonera);
        botonera.appendChild(document.createElement('br'));

        for (var i = totalPisos; i >= 0; i--) {
    var piso = i == 0 ? 'PB' : i;
    var indice = totalPisos - i; // Ajustamos el índice para que coincida con la numeración real del piso
    crearBoton('A', botonera, indice);
    crearBoton(piso, botonera, false);
    crearBoton('B', botonera, indice);
    botonera.appendChild(document.createElement('br'));
    estadoBotonesMatriz.push({ salida_a: 1, piso: piso, salida_b: 0 });
}

for (var i = -1; i >= -totalSubsuelos; i--) {
    var indicePositivo = totalPisos + Math.abs(i);
    var piso = i == 0 ? 'PB' : i;
    crearBoton('A', botonera, indicePositivo);
    crearBoton(piso, botonera, false);
    crearBoton('B', botonera, indicePositivo);
    botonera.appendChild(document.createElement('br'));
    estadoBotonesMatriz.push({ salida_a: 1, piso: piso, salida_b: 0 });
}

function crearBoton(texto, contenedor, indice) { // Eliminamos el parámetro adicional para el índice del piso
    var button = document.createElement('button');
    button.textContent = texto;
    button.classList.add('btn');

    if (texto === 'A' || texto === 'B') {
        button.classList.add('btn-ascensor');
        button.dataset.indice = indice;
        button.dataset.tipo = texto;
        button.addEventListener('click', handleClickBoton);
    }

    contenedor.appendChild(button);

    if (texto !== 'A' && texto !== 'B') {
        button.classList.add('piso');
        button.disabled = true;
    }
}


        function crearEncabezado(texto, contenedor) {
            var button = document.createElement('button');
            button.textContent = texto;
            button.classList.add('btnEnc');
            if (texto === 'Pisos') {
                button.classList.add('btnEncPiso');
            }
            contenedor.appendChild(button);
        }

        function handleClickBoton(event) {
    event.preventDefault();
    var indice = parseInt(this.dataset.indice);
    var tipo = this.dataset.tipo;
    var estadoBoton = estadoBotonesMatriz[indice];
    var otroTipo = tipo === 'A' ? 'salida_b' : 'salida_a';

    estadoBoton[tipo === 'A' ? 'salida_a' : 'salida_b'] = 1 - estadoBoton[tipo === 'A' ? 'salida_a' : 'salida_b'];
    estadoBoton[otroTipo] = 1 - estadoBoton[tipo === 'A' ? 'salida_a' : 'salida_b'];

    var botonesFila = document.querySelectorAll('button[data-indice="' + indice + '"]');
    botonesFila.forEach(function(boton) {
        actualizarColorBoton(boton, estadoBotonesMatriz[indice]);
    });
    actualizarInputHidden();
}


        function actualizarColorBoton(boton, estado) {
            if (boton.dataset.tipo === 'A') {
                boton.style.backgroundColor = estado.salida_a === 1 ? 'green' : 'red';
            } else if (boton.dataset.tipo === 'B') {
                boton.style.backgroundColor = estado.salida_b === 1 ? 'green' : 'red';
            }
        }

        document.querySelectorAll('.btn-ascensor').forEach(function(boton) {
            var indice = parseInt(boton.dataset.indice);
            actualizarColorBoton(boton, estadoBotonesMatriz[indice]);
        });

        function actualizarInputHidden() {
            var inputHidden = document.getElementById('datosFormularioInput');
            inputHidden.value = JSON.stringify(estadoBotonesMatriz);
        }
    });
</script>




<?php include '../resources/views/new/includes/footer.blade.php'; ?>

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

<script>
      var totalPisosAll = {{ $paradas }};
      var totalSubsuelos = {{ $subsuelos }};
      var totalPisos = totalPisosAll - totalSubsuelos - 1;      
    </script>


<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var estadoBotonesMatriz = [];
  window.estadoBotonesMatriz = estadoBotonesMatriz;

  var botonera = document.getElementById('botonera');

  crearEncabezado('A', botonera);
  crearEncabezado('Pisos', botonera);
  crearEncabezado('B', botonera);
  botonera.appendChild(document.createElement('br'));

  for (var i = totalPisos; i >= 0; i--) {
    crearBoton('A', botonera, i);
    crearBoton(i === 0 ? 'PB' : i, botonera, -1);
    crearBoton('B', botonera, i);
    botonera.appendChild(document.createElement('br'));
    estadoBotonesMatriz.push([1, 0]);
  }

  for (var i = -1; i >= -totalSubsuelos; i--) {
    var indicePositivo = totalPisos + Math.abs(i);
    crearBoton('A', botonera, indicePositivo);
    crearBoton(i, botonera, -1);
    crearBoton('B', botonera, indicePositivo);
    botonera.appendChild(document.createElement('br'));
    estadoBotonesMatriz.push([1, 0]);
  }

  function crearBoton(texto, contenedor, indice, verdePorDefecto = true) {
    var button = document.createElement('button');
    button.textContent = texto;
    button.classList.add('btn');

    if (texto === 'A' || texto === 'B') {
      button.classList.add('btn-ascensor');
      button.dataset.indice = indice;
      button.dataset.tipo = texto;
      button.style.backgroundColor = verdePorDefecto && texto === 'A' ? 'green' : 'red';
      button.addEventListener('click', function(event) {
        event.preventDefault();
        var tipo = this.dataset.tipo;
        var indice = parseInt(this.dataset.indice);
        var estadoBoton = estadoBotonesMatriz[indice];
        estadoBoton[tipo === 'A' ? 0 : 1] = 1 - estadoBoton[tipo === 'A' ? 0 : 1];
        this.style.backgroundColor = estadoBoton[tipo === 'A' ? 0 : 1] === 1 ? 'green' : 'red';
        actualizarInputsHidden();
        console.log('Estado de botones:', estadoBotonesMatriz);
      });
    } else {
      button.classList.add('piso');
      button.disabled = true;
    }

    contenedor.appendChild(button);
  }

  function crearEncabezado(texto, contenedor) {
    var button = document.createElement('button');
    button.textContent = texto;
    button.classList.add('btnEnc');
    if (texto !== 'A' && texto !== 'B') {
      button.classList.add('btnEncPiso');
    }
    contenedor.appendChild(button);
  }

  function actualizarInputsHidden() {
  var datos = [];
  var pisos = [];

  // Agregar los pisos positivos en orden descendente
  for (var i = totalPisos; i > 0; i--) {
    pisos.push(i);
  }
  
  // Agregar PB
  pisos.push('PB');
  
  // Agregar los pisos negativos en orden ascendente
  for (var i = -1; i >= -totalSubsuelos; i--) {
    pisos.push(i);
  }
  
  // Generar los datos en el orden deseado
  for (var i = 0; i < pisos.length; i++) {
    var piso = pisos[i];
    var indice;

    if (piso === 'PB') {
      indice = 0;  // PB es el piso 0
    } else if (piso > 0) {
      indice = piso;  // Pisos positivos
    } else {
      indice = totalPisos + Math.abs(piso);  // Pisos negativos
    }

    var estadoBoton = estadoBotonesMatriz[indice];
    datos.push({
      salida_a: estadoBoton[0],
      piso: piso,
      salida_b: estadoBoton[1]
    });
  }
  
  var inputHidden = document.getElementById('estadoBotonesJson');
  inputHidden.value = JSON.stringify(datos);
}


  var inputHidden = document.createElement('input');
  inputHidden.type = 'hidden';
  inputHidden.name = 'estadoBotonesJson';
  inputHidden.id = 'estadoBotonesJson';
  botonera.appendChild(inputHidden);

  var formulario = document.getElementById('form_habilitaciones');

  formulario.addEventListener('submit', function(event) {
    event.preventDefault();
    actualizarInputsHidden();
    formulario.submit();
  });
});

</script>



<div class="">

  <h2 class="titleSection"> <div class="div-paso">4</div> Habilitaciones accesos</h2>   

  <form class="formulario" id="form_habilitaciones" action="{{ route('newPaso10') }}" method="POST" required>
    @csrf


    <!-- este grupo en la bd se guarda en la tabla "pedidos" -->
    <input required  type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="telefono_empresa" value="<?php echo htmlspecialchars($telefono_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_control" value="<?php echo htmlspecialchars($tipo_control, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "motores" -->
    <input required  type="hidden" name="motor_potencia" value="<?php echo htmlspecialchars($motor_potencia, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_marca" value="<?php echo htmlspecialchars($motor_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_voltaje" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_encoder" value="<?php echo htmlspecialchars($motor_encoder, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_rescate" value="<?php echo htmlspecialchars($motor_rescate, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "tipos_puertas" -->
    <input required  type="hidden" name="tipo_puerta" value="<?php echo htmlspecialchars($tipo_puerta, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "detalles_puertas" -->
    <input required  type="hidden" name="puerta_marca" value="<?php echo htmlspecialchars($puerta_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="puerta_voltaje" value="<?php echo htmlspecialchars($puerta_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="patin_retractil" value="<?php echo htmlspecialchars($patin_retractil, ENT_QUOTES, 'UTF-8'); ?>">
    
    <!-- este grupo en  la bd se guarda en la tabla "accesos" -->
    <input required  type="hidden" name="accesos" value="<?php echo htmlspecialchars($accesos, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "detalles_generales" -->
    <input required  type="hidden" name="tipo_botonera" value="<?php echo htmlspecialchars($tipo_botonera, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="paradas" value="<?php echo htmlspecialchars($paradas, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="subsuelos" value="<?php echo htmlspecialchars($subsuelos, ENT_QUOTES, 'UTF-8'); ?>">

    <input required  type="hidden" name="vista" value="dobleAyB">

  
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

<?php include '../resources/views/new/includes/footer.blade.php'; ?>

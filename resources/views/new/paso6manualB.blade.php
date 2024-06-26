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
            <div class="circle circle-azul">3</div> Puertas
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


  <div class="columna derecha">


<div class="formulario">

  <h2 class="titleSection"> <div class="div-paso">3</div> Detalles de puerta</h2>  

  <form action="{{ route('newPaso7') }}" method="POST" onsubmit="prepararEnvio(this)">
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="telefono_empresa" value="<?php echo htmlspecialchars($telefono_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_control" value="<?php echo htmlspecialchars($tipo_control, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "motores" -->
    <input type="hidden" name="motor_potencia" value="<?php echo htmlspecialchars($motor_potencia, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_marca" value="<?php echo htmlspecialchars($motor_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_voltaje" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_encoder" value="<?php echo htmlspecialchars($motor_encoder, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_rescate" value="<?php echo htmlspecialchars($motor_rescate, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "tipos_puertas" -->
    <input type="hidden" name="tipo_puerta" value="<?php echo htmlspecialchars($tipo_puerta, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="maca_puerta" value="{{ null }}">


    <div class="form-group">
        <label for="puerta_voltaje">Voltaje de la puerta</label>
        <select id="puerta_voltaje" name="puerta_voltaje" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            <option value="220V">220V</option>
            <option value="380V">380V</option>
            <option value="VVF">VVF</option>
        </select>
    </div>



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

<script src="../../resources/views/new/js/opcionOtra.js"></script>

<?php include '../resources/views/new/includes/footer.blade.php'; ?>

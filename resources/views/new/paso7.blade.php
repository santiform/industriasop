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

  <h2 class="titleSection"> <div class="div-paso">3</div> Accesos</h2>  

  <form action="{{ route('newPaso8') }}" method="POST" onsubmit="prepararEnvio(this)" required>
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input required  type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="telefono_empresa" value="<?php echo htmlspecialchars($telefono_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_control" value="<?php echo htmlspecialchars($tipo_control, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "motores" -->
    <input required  type="hidden" name="motor_potencia" value="<?php echo htmlspecialchars($motor_potencia, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_marca" value="<?php echo htmlspecialchars($motor_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_voltaje" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_encoder" value="<?php echo htmlspecialchars($motor_encoder, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="motor_rescate" value="<?php echo htmlspecialchars($motor_rescate, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "tipos_puertas" -->
    <input required  type="hidden" name="tipo_puerta" value="<?php echo htmlspecialchars($tipo_puerta, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "detalles_puertas" -->
    <input required  type="hidden" name="puerta_marca" value="<?php echo htmlspecialchars($puerta_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="puerta_voltaje" value="<?php echo htmlspecialchars($puerta_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="patin_retractil" value="<?php echo htmlspecialchars($patin_retractil, ENT_QUOTES, 'UTF-8'); ?>">



    <div class="form-group">
        <label for="accesos">Cantidad de accesos</label>
        <select required  id="accesos" name="accesos" class="form-control">
            <option value="" disabled selected></option>
            <option value="SIMPLE">SIMPLE</option>
            <option value="DOBLE">DOBLE</option>
            <option value="TRIPLE">TRIPLE</option>
            <option value="otra">Otras...</option>
        </select>
        <div class="campo-adicional" style="display: none;">
            <label for="accesos_pers">Ingrese un valor personalizado</label>
            <input type="text" id="accesos_pers" name="accesos_pers" class="form-control">
        </div>
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

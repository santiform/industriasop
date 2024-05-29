<?php include '../resources/views/new/includes/header.php'; ?>

<div class="formulario">
  <h1 class="title">Industrias <b>OP</b></h1>

  <hr>

  <h2 class="titleSection">Encoder</h2>

  <form action="{{ route('newPaso4') }}" method="POST">
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "motores" -->
    <input type="hidden" name="tipo_control" value="<?php echo htmlspecialchars($tipo_control, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_potencia" value="<?php echo htmlspecialchars($motor_potencia, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_marca" value="<?php echo htmlspecialchars($motor_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_voltaje" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">


    <div class="form-group">
        <label for="tipo_puerta">Tipos de puerta</label>
        <select id="tipo_puerta" name="tipo_puerta" class="form-control" onchange="mostrarInputOtro('tipo_puerta')">
            <option disabled selected>Seleccione una opción</option>
            <option value="AUTOMÁTICAS">AUTOMÁTICAS</option>
            <option value="SEMIAUTOMÁTICAS">SEMIAUTOMÁTICAS</option>
            <option value="MANUALES">MANUALES</option>
            <option value="otra">Otra...</option>
        </select>   
        <div class="campo-adicional" id="otra_tipo_puerta" style="display: none;">
            <label for="otra_tipo_puerta_input">Ingrese una opción personalizada</label>
            <input type="text" id="otra_tipo_puerta_input" name="otra_tipo_puerta_input" class="form-control">
        </div>
    </div>


    <div class="btnNext">
      <button type="submit">Siguiente <i class="arrow-right">➔</i></button>
    </div>
    
  </form>
</div>

<script src="../../resources/views/new/js/opcionOtra.js"></script>

<?php include '../resources/views/new/includes/footer.php'; ?>

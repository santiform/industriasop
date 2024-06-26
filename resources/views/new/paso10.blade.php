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


<div class="formulario">

  <h2 class="titleSection"> <div class="div-paso">4</div> Detalles generales</h2>  

  <form action="{{ route('newPaso11') }}" method="POST">
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

    <!-- este grupo en  la bd se guarda en la tabla "detalles_puertas" -->
    <input type="hidden" name="puerta_marca" value="<?php echo htmlspecialchars($puerta_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="puerta_voltaje" value="<?php echo htmlspecialchars($puerta_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="patin_retractil" value="<?php echo htmlspecialchars($patin_retractil, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "accesos" -->
    <input type="hidden" name="accesos" value="<?php echo htmlspecialchars($accesos, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "detalles_generales" -->
    <input type="hidden" name="tipo_botonera" value="<?php echo htmlspecialchars($tipo_botonera, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="paradas" value="<?php echo htmlspecialchars($paradas, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="subsuelos" value="<?php echo htmlspecialchars($subsuelos, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- esto no se guarda en bd, es solo para lógica -->
    <input type="hidden" name="vista" value="<?php echo htmlspecialchars($vista, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "habilitaciones_accesos" -->
    <input type="hidden" name="estadoBotones" value="{{ htmlspecialchars(json_encode($estadoBotones), ENT_QUOTES, 'UTF-8') }}">

    <div class="form-group">
        <label for="placa_cabina">Placa cabina</label>
        <select id="placa_cabina" name="placa_cabina" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            <option value="1">Sí</option>
            <option value="0">No</option>            
        </select>
    </div>

    <div class="form-group">
        <label for="indicador_cabina">Indicador cabina</label>
        <select id="indicador_cabina" name="indicador_cabina" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            <option value="1">Sí</option>
            <option value="0">No</option>            
        </select>
    </div>

    <div class="form-group">
        <label for="indicador_pb">Indicador Planta Baja</label>
        <select id="indicador_pb" name="indicador_pb" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            <option value="1">Sí</option>
            <option value="0">No</option>            
        </select>
    </div>

    <div class="form-group">
        <label for="indicador_palier">Indicador Palier</label>
        <select id="indicador_palier" name="indicador_palier" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            <option value="1">Sí</option>
            <option value="0">No</option>            
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

<?php include '../resources/views/new/includes/footer.blade.php'; ?>

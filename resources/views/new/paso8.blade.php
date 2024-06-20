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

  <h2 class="titleSection"> <div class="div-paso">4</div> Paradas</h2>  

  <form action="{{ route('newPaso9') }}" method="POST" onsubmit="prepararEnvio(this)">
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
    <input type="hidden" name="motor_encoder" value="<?php echo htmlspecialchars($motor_encoder, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "tipos_puertas" -->
    <input type="hidden" name="tipo_puerta" value="<?php echo htmlspecialchars($tipo_puerta, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "detalles_puertas" -->
    <input type="hidden" name="puerta_marca" value="<?php echo htmlspecialchars($puerta_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="puerta_voltaje" value="<?php echo htmlspecialchars($puerta_voltaje, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "accesos" -->
    <input type="hidden" name="accesos" value="<?php echo htmlspecialchars($accesos, ENT_QUOTES, 'UTF-8'); ?>">

    @if ($accesos != "SIMPLE" && $accesos != "DOBLE")
    <div class="form-group" style="background-color: #40464c; ">
        <label for=""><p style="font-weight: 400; margin-bottom: -1rem; color: white;" >Si la cabina NO posee acceso doble o simple, deberás ponerte en
        contacto con nuestro equipo de ventas para gestionar las habilitaciones de puertas.</p></label>
    </div>

    @endif

    @if ($tipo_funcionamiento == 1)
    <div class="form-group">
        <label for="paradas">Cantidad de paradas (totales, incluyendo subsuelos)<br><p style="color: red;" >(Máximo 8 paradas)</p></label>

        <input type="number" name="paradas" class="form-control" min="1" max="8">
    </div>

    <div class="form-group">
        <label for="subsuelos">Cantidad de subsuelos</label>
        <input type="number" name="subsuelos" class="form-control" min="1" max="5">
    </div>

    @endif



    @if ($tipo_funcionamiento == 2) <div class="form-group">
        <label for="paradas">Cantidad de paradas (totales, incluyendo subsuelos)</label>

        <input type="number" name="paradas" class="form-control">
    </div>

    <div class="form-group">
        <label for="subsuelos">Cantidad de subsuelos</label>
        <input type="number" name="subsuelos" class="form-control">
    </div>

    @endif



    @if ($accesos == "DOBLE")
    <div class="form-group">
        <label for="tipo_botonera">Cantidad de botoneras</label>
        <select id="tipo_botonera" name="tipo_botonera" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            <option value="1">1 botonera</option>
            <option value="2">2 botoneras</option>
        </select>
    </div>
    @endif





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

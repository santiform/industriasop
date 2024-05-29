<?php include '../resources/views/new/includes/header.blade.php'; ?>

<div class="container">

  <div class="columna izquierda"><div class="timeline">

        <div class="paso paso-azul">
          <div class="circle circle-azul">✔</div> Datos básicos
        </div>

        <div class="linea linea-azul">|</div>

        <div class="paso paso-azul">
            <div class="circle circle-azul">2</div> Control
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


  <div class="columna derecha">


<div class="formulario">

  <h2 class="titleSection"> <div class="div-paso">2</div> Tipo de control y Motor</h2>  

  <form action="{{ route('newPaso3') }}" method="POST">
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">


    <div class="form-group">
        <label for="tipo_control">Tipo de control</label>
        <select id="tipo_control" name="tipo_control">
            <option disabled selected>Seleccione una opción</option>
            @foreach($tipos_controles as $tipo_control)
                <option value="{{ $tipo_control->id }}">{{ $tipo_control->nombre }}</option>
            @endforeach
        </select>
    </div>


<div class="form-group">
    <label for="motor_potencia">Potencia del Motor</label>
    <p>Escriba en números los HP del motor que necesita. Recuerde usar punto si es un valor con decimal.</p>
    <input type="number" name="motor_potencia" class="form-control">
</div>



<div class="form-group">
    <label for="motor_marca">Marca del Motor</label>
    <select id="motor_marca" name="motor_marca" class="form-control" onchange="mostrarInputOtro('motor_marca')">
        <option disabled selected>Seleccione una opción</option>
        <option value="MORRIS">MORRIS</option>
        <option value="ROJAS">ROJAS</option>
        <option value="OMAR LIFE">OMAR LIFE</option>
        <option value="otra">Otro...</option>
    </select>
    <div class="campo-adicional" style="display: none;">
        <label for="otra_marca_input">Ingrese un valor personalizado</label>
        <input type="text" id="otra_marca_input" name="otra_marca_input" class="form-control">
    </div>
</div>



      <div class="form-group">
    <label for="motor_voltaje">Voltaje del Motor:</label>
    <select id="motor_voltaje" name="motor_voltaje" class="form-control" onchange="mostrarInputOtro('motor_voltaje')">
        <option disabled selected>Seleccione una opción</option>
        <option value="BOBINA 48V DC">BOBINA 48V DC</option>
        <option value="BOBINA 220V AC">BOBINA 220V AC</option>
        <option value="BOBINA 220V DC">BOBINA 220V DC</option>
        <option value="BOBINA 12V DC">BOBINA 12V DC</option>
        <option value="otra">Otro...</option>
    </select>
    <div class="campo-adicional" id="otro_motor_voltaje" style="display: none;">
        <label for="otro_motor_voltaje_input" class="labelpers">Ingrese un valor personalizado</label>
        <input type="text" id="otro_motor_voltaje_input" name="otro_motor_voltaje_input" class="form-control">
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

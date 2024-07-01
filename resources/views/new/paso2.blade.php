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

  <form action="{{ route('newPaso3') }}" method="POST" onsubmit="prepararEnvio(this)" required>
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input required  type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="telefono_empresa" value="<?php echo htmlspecialchars($telefono_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input required  type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">


    <div class="form-group">
        <label for="tipo_control">Tipo de control</label>
        <select required  id="tipo_control" name="tipo_control">
            <option value="" disabled selected></option>
            @foreach($tipos_controles as $tipo_control)
                <option value="{{ $tipo_control->id }}">{{ $tipo_control->nombre }}</option>
            @endforeach
        </select>
    </div>

@if ($tipo_funcionamiento == 1)
<div class="form-group">
    <label for="motor_potencia">Potencia del Motor</label>
    <p>Escriba en números los HP del motor que necesita. Recuerde usar punto si es un valor con decimal.</p>
    <input required  type="number" id="motor_potencia" name="motor_potencia" step="0.01" min="0" class="form-control">
</div>



<div class="form-group">
    <label for="motor_marca">Marca del Motor</label>
    <select required  id="motor_marca" name="motor_marca" class="form-control">
        <option value="" disabled selected></option>
        <option value="MORRIS">MORRIS</option>
        <option value="ROJAS">ROJAS</option>
        <option value="OMAR LIFE">OMAR LIFE</option>
        <option value="otra">Otro...</option>
    </select>
    <div class="campo-adicional" style="display: none;">
        <label for="motor_marca_pers">Ingrese un valor personalizado</label>
        <input type="text" id="motor_marca_pers" name="motor_marca_pers" class="form-control">
    </div>
</div>



      <div class="form-group">
    <label for="motor_voltaje">Voltaje del Motor:</label>
    <select required  id="motor_voltaje" name="motor_voltaje" class="form-control" >
        <option value="" disabled selected></option>
        <option value="BOBINA 48V DC">BOBINA 48V DC</option>
        <option value="BOBINA 220V AC">BOBINA 220V AC</option>
        <option value="BOBINA 220V DC">BOBINA 220V DC</option>
        <option value="BOBINA 12V DC">BOBINA 12V DC</option>
        <option value="otra">Otro...</option>
    </select>
    <div class="campo-adicional" id="motor_voltaje" style="display: none;">
        <label for="motor_voltaje_pers" >Ingrese un valor personalizado</label>
        <input type="text" id="motor_voltaje_pers" name="motor_voltaje_pers" class="form-control">
    </div>
</div>

@endif



@if ($tipo_funcionamiento == 2)
<div class="form-group">
    <label for="motor_potencia">Potencia del Motor</label>
    <p>Escriba en números los HP del motor que necesita. Recuerde usar punto si es un valor con decimal.</p>
    <input required  type="number" id="motor_potencia" name="motor_potencia" step="0.01" min="0" class="form-control">
</div>



<div class="form-group">
    <label for="motor_marca">Marca del Motor</label>
    <select required  id="motor_marca" name="motor_marca" class="form-control" onchange="mostrarinput required Otro('motor_marca')">
        <option value="" disabled selected></option>
        <option value="ADSUR">ADSUR</option>
        <option value="REDUAR">REDUAR</option>
        <option value="otra">Otro...</option>
    </select>
    <div class="campo-adicional" style="display: none;">
        <label for="motor_marca_pers">Ingrese un valor personalizado</label>
        <input type="text" id="motor_marca_pers" name="motor_marca_pers" class="form-control">
    </div>
</div>



      <div class="form-group">
    <label for="motor_voltaje">Freno del Motor:</label>
    <select required  id="motor_voltaje" name="motor_voltaje" class="form-control" onchange="mostrarinput required Otro('motor_voltaje')">
        <option value="" disabled selected></option>
        <option value="FRENO 110V DC">FRENO 110V DC</option>
        <option value="FRENO 110V AC">FRENO 110V AC</option>
        <option value="FRENO 220V DC">FRENO 220V DC</option>
        <option value="FRENO 220V AC">FRENO 220V AC</option>        
        <option value="otra">Otro...</option>
    </select>
    <div class="campo-adicional" id="motor_voltaje" style="display: none;">
        <label for="motor_voltaje_pers" >Ingrese un valor personalizado</label>
        <input type="text" id="motor_voltaje_pers" name="motor_voltaje_pers" class="form-control">
    </div>
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

<script src="../../resources/views/new/js/validaciconSelects.js"></script>
<script src="../../resources/views/new/js/opcionOtra.js"></script>

<?php include '../resources/views/new/includes/footer.blade.php'; ?>

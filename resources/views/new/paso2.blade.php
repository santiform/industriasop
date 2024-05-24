<?php include '../resources/views/new/includes/header.php'; ?>

    <script>
        function mostrarInputOtro(selectId) {
            var select = document.getElementById(selectId);
            var otroInput = select.nextElementSibling;

            if (select.value === "otra") {
                otroInput.style.display = "block";
            } else {
                otroInput.style.display = "none";
                otroInput.value = ""; // Establece el valor del campo adicional como vacío
            }
        }

        function prepararEnvio(form) {
            var camposAdicionales = form.getElementsByClassName("campo-adicional");

            for (var i = 0; i < camposAdicionales.length; i++) {
                var campo = camposAdicionales[i];
                var select = campo.previousElementSibling;
                
                if (campo.style.display !== "none") {
                    select.value = campo.value; // Asigna el valor del campo adicional al valor del select
                }
            }
        }
    </script>

<div class="formulario">
  <h1 class="title">Industrias <b>OP</b></h1>

  <hr>

  <h2 class="titleSection">Tipo de control y Motor</h2>

  <form action="{{ route('newPaso3') }}" method="POST">
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">


    <div class="form-group">
        <label for="tipo_funcionamiento">Tipo de control</label>
        <select id="tipo_funcionamiento" name="tipo_funcionamiento">
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


    <div class="btnNext">
      <button type="submit">Siguiente <i class="arrow-right">➔</i></button>
    </div>
    
  </form>
</div>


<?php include '../resources/views/new/includes/footer.php'; ?>

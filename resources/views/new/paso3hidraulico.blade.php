<?php include '../resources/views/new/includes/header.php'; ?>

    <script>
        function mostrarInputOtro(selectId, inputId) {
            var select = document.getElementById(selectId);
            var otroInput = document.getElementById(inputId);

            if (select.value === "otra") {
                otroInput.style.display = "block";
            } else {
                otroInput.style.display = "none";
            }
        }
    </script>

<div class="formulario">
  <h1 class="title">Industrias <b>OP</b></h1>

  <hr>

  <h2 class="titleSection">Tipo de control y Motor</h2>

  <form action="{{ route('newPaso2') }}" method="POST">
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">


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
            <label for="tipo_obra">Marca del Motor</label>
            <select id="tipo_obra" name="tipo_obra" class="form-control" onchange="mostrarInputOtro('tipo_obra', 'otra_marca')">
                <option disabled selected>Seleccione una opción</option>
                <option value="MORRIS">MORRIS</option>
                <option value="ROJAS">ROJAS</option>
                <option value="OMAR LIFE">OMAR LIFE</option>
                <option value="otra">Otro...</option>
            </select>
        </div>
        <div class="form-group campo-adicional" id="otra_marca" style="display: none;">
            <label for="otra_marca_input">Ingrese una opción personalizada</label>
            <input type="text" id="otra_marca_input" name="otra_marca_input" class="form-control">
        </div>


        <div class="form-group">
            <label for="tipo_modelo">Modelo del Motor:</label>
            <select id="tipo_modelo" name="tipo_modelo" class="form-control" onchange="mostrarInputOtro('tipo_modelo', 'otro_modelo')">
                <option disabled selected>Seleccione una opción</option>
                <option value="1">Modelo A</option>
                <option value="2">Modelo B</option>
                <option value="3">Modelo C</option>
                <option value="otra">Otro...</option>
            </select>
        </div>
        <div class="form-group campo-adicional" id="otro_modelo" style="display: none;">
            <label for="otro_modelo_input" class="labelpers">Ingrese una opción personalizada</label>
            <input type="text" id="otro_modelo_input" name="otro_modelo_input" class="form-control">
        </div>

    <div class="btnNext">
      <button type="submit">Siguiente <i class="arrow-right">➔</i></button>
    </div>
    
  </form>
</div>


<?php include '../resources/views/new/includes/footer.php'; ?>

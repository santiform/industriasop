<?php include '../resources/views/new/includes/header.blade.php'; ?>

<div class="container">

  <div class="columna izquierda"><div class="timeline">

        <div class="paso paso-azul">
          <div class="circle circle-azul">1</div> Datos básicos
        </div>

        <div class="linea linea-azul">|</div>

        <div class="paso paso-gris">
            <div class="circle circle-gris">2</div> Control
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

  <h2 class="titleSection"> <div class="div-paso">1</div> DATOS BÁSICOS</h2>

  <form action="{{ route('newPaso2') }}" method="POST" required>
    @csrf

      <div class="titulo-form-group">De la empresa</div>
      <div class="form-group">

        <label for="nombre">Nombre de empresa</label>
        <input required  type="text" id="nombre" name="nombre" placeholder="">

        <div style="height: 1.6rem;" ></div>

        <label for="email">Email de empresa</label>
        <input required  type="email" id="email" name="email" placeholder="">

        <div style="height: 1.6rem;" ></div>

        <label for="telefono">Teléfono de empresa</label>
        <input required  type="tel" id="telefono" name="telefono" placeholder="">

      </div>
      

      <div class="titulo-form-group">De la obra</div>
      <div class="form-group">

        <label for="direccion">Dirección de obra</label>
        <input required  type="text" id="direccion" name="direccion" placeholder="">

        <div style="height: 1.6rem;" ></div>

        <label for="tipo_obra">Tipo de obra</label>
          <select required  id="tipo_obra" name="tipo_obra">
              <option disabled selected>Seleccione una opción</option>
              @foreach($tipos_obras as $tipo_obra)
                  <option value="{{ $tipo_obra->id }}">{{ $tipo_obra->nombre }}</option>
              @endforeach
          </select>

      </div>

      <div class="titulo-form-group">Del ascensor</div>
      <div class="form-group">
          <label for="tipo_funcionamiento">Cuadro de maniobras</label>
          <select required  id="tipo_funcionamiento" name="tipo_funcionamiento">
              <option disabled selected>Seleccione una opción</option>
              @foreach($tipos_funcionamientos as $tipo_funcionamiento)
                  <option value="{{ $tipo_funcionamiento->id }}">{{ $tipo_funcionamiento->nombre }}</option>
              @endforeach
          </select>
      </div>


    <div class="container">

      <div class="boton-izquierdo">
        
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

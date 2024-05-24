<?php include '../resources/views/new/includes/header.php'; ?>

<div class="formulario">
  <h1 class="title">Industrias <b>OP</b></h1>

  <hr>

  <h2 class="titleSection">Datos de la empresa</h2>

  <form action="{{ route('newPaso2') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="nombre">Nombre de empresa</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre de empresa">
    </div>
    
    <div class="form-group">
      <label for="email">Email de empresa</label>
      <input type="email" id="email" name="email" placeholder="Ingrese el email de la empresa">
    </div>

    <div class="form-group">
      <label for="telefono">Teléfono de empresa</label>
      <input type="tel" id="telefono" name="telefono" placeholder="Ingrese el teléfono de la empresa">
    </div>

    <div class="form-group">
      <label for="direccion">Dirección de obra</label>
      <input type="text" id="direccion" name="direccion" placeholder="Ingrese la dirección de la obra">
    </div>

    <div class="form-group">
        <label for="tipo_obra">Tipo de obra</label>
        <select id="tipo_obra" name="tipo_obra">
            <option disabled selected>Seleccione una opción</option>
            @foreach($tipos_obras as $tipo_obra)
                <option value="{{ $tipo_obra->id }}">{{ $tipo_obra->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tipo_funcionamiento">Cuadro de maniobras</label>
        <select id="tipo_funcionamiento" name="tipo_funcionamiento">
            <option disabled selected>Seleccione una opción</option>
            @foreach($tipos_funcionamientos as $tipo_funcionamiento)
                <option value="{{ $tipo_funcionamiento->id }}">{{ $tipo_funcionamiento->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="btnNext">
      <button type="submit">Siguiente <i class="arrow-right">➔</i></button>
    </div>
    
  </form>
</div>

<?php include '../resources/views/new/includes/footer.php'; ?>

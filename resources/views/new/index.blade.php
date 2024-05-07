<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../resources/css/neworder.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<div class="formulario">
  <h2 class="mb-4 title">Industrias <b>OP</b></h2>

  <hr>

  <div class="espaciador18"></div>

  <h2 class="mb-4 titleSection">Datos de la empresa</h2>

  <div class="espaciador12"></div>

  <form action="{{ route('newPaso2') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="nombre">Nombre de empresa</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre de empresa">
    </div>
    
    <div class="form-group">
      <label for="email">Email de empresa</label>
      <input type="email" class="form-control" id="email" placeholder="Ingrese el email de la empresa">
    </div>

    <div class="form-group">
      <label for="telefono">Teléfono de empresa</label>
      <input type="tel" class="form-control" id="telefono" placeholder="Ingrese el teléfono de la empresa">
	</div>

	<div class="form-group">
      <label for="nombre">Dirección de obra</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese la dirección de la obra">
    </div>

    <div class="form-group">
        <label for="tipo_obra">Tipo de obra</label>
        <select id="tipo_obra" name="tipo_obra" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            @foreach($tipos_obras as $tipo_obra)
                <option value="{{ $tipo_obra->id }}">{{ $tipo_obra->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tipo_funcionamiento">Cuadro de maniobras</label>
        <select id="tipo_funcionamiento" name="tipo_funcionamiento" class="form-control">
            <option disabled selected>Seleccione una opción</option>
            @foreach($tipos_funcionamientos as $tipo_funcionamiento)
                <option value="{{ $tipo_funcionamiento->id }}">{{ $tipo_funcionamiento->nombre }}</option>
            @endforeach
        </select>
    </div>


    <div class="btnNext" >
    	<button type="submit" class="btn btn-primary ">Siguiente <i class="bi bi-arrow-right-circle"></i></button>
    </div>
    
  </form>
</div>

</body>
</html>

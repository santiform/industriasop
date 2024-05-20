<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    .formulario {
      max-width: 600px;
      margin: 50px auto;
      padding: 35px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1{
      margin: 0;
    }
    .title {
      text-align: center;
      color: #333;
    }
    .titleSection {
      margin-top: 30px;
      color: #555;
    }
    hr {
      border: 0;
      height: 1px;
      background-color: #e0e0e0;
      margin: 20px 0;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    .form-group input, .form-group select {
      width: calc(100% - 22px);
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      outline: none;
      box-sizing: border-box;
    }
    .form-group input:focus, .form-group select:focus {
      border-color: #007bff;
    }
    .btnNext {
      text-align: center;
    }
    .btnNext button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .btnNext button:hover {
      background-color: #0056b3;
    }
    .btnNext i {
      margin-left: 5px;
    }
  </style>
</head>
<body>

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

</body>
</html>


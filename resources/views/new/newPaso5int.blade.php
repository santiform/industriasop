<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirigiendo...</title>
</head>
<body>
    <form id="paso5-form" action="{{ route('newPaso5') }}" method="POST">
        @csrf
        <input type="hidden" name="email_empresa" value="{{ $datos['email_empresa'] }}">
        <input type="hidden" name="nombre_empresa" value="{{ $datos['nombre_empresa'] }}">
        <input type="hidden" name="direccion_obra" value="{{ $datos['direccion_obra'] }}">
        <input type="hidden" name="tipo_obra" value="{{ $datos['tipo_obra'] }}">
        <input type="hidden" name="tipo_funcionamiento" value="{{ $datos['tipo_funcionamiento'] }}">
        <input type="hidden" name="tipo_control" value="{{ $datos['tipo_control'] }}">
        <input type="hidden" name="motor_potencia" value="{{ $datos['motor_potencia'] }}">
        <input type="hidden" name="motor_marca" value="{{ $datos['motor_marca'] }}">
        <input type="hidden" name="motor_voltaje" value="{{ $datos['motor_voltaje'] }}">
        <input type="hidden" name="motor_encoder" value="{{ $datos['motor_encoder'] }}">
        <input type="hidden" name="motor_rescate" value="{{ $datos['motor_rescate'] }}">
    </form>
    <script>
        document.getElementById('paso5-form').submit();
    </script>
</body>
</html>

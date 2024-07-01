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
            <div class="circle circle-azul">✔</div> Detalles generales
        </div>

        <div class="linea linea-azul">|</div>

        <div class="paso paso-azul">
            <div class="circle circle-azul">5</div> Confirmación
        </div>

    </div>
  </div>


  <div class="columna derecha">


<div class="formulario">

  <h2 class="titleSection"> <div class="div-paso">5</div> Confirmación</h2>  

  <form action="{{ route('newPaso12') }}" method="POST" >
    @csrf


        <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="{{ old('email_empresa', $email_empresa) }}">
    <input type="hidden" name="nombre_empresa" value="{{ old('nombre_empresa', $nombre_empresa) }}">
    <input type="hidden" name="telefono_empresa" value="{{ old('telefono_empresa', $telefono_empresa) }}">
    <input type="hidden" name="direccion_obra" value="{{ old('direccion_obra', $direccion_obra) }}">
    <input type="hidden" name="tipo_obra" value="{{ old('tipo_obra', $tipo_obra) }}">
    <input type="hidden" name="tipo_funcionamiento" value="{{ old('tipo_funcionamiento', $tipo_funcionamiento) }}">
    <input type="hidden" name="tipo_control" value="{{ old('tipo_control', $tipo_control) }}">

    <!-- este grupo en  la bd se guarda en la tabla "motores" -->
    <input type="hidden" name="motor_potencia" value="{{ old('motor_potencia', $motor_potencia) }}">
    <input type="hidden" name="motor_marca" value="{{ old('motor_marca', $motor_marca) }}">
    <input type="hidden" name="motor_voltaje" value="{{ old('motor_voltaje', $motor_voltaje) }}">
    <input type="hidden" name="motor_encoder" value="{{ old('motor_encoder', $motor_encoder) }}">
    <input type="hidden" name="motor_rescate" value="{{ old('motor_rescate', $motor_rescate) }}">
    <input type="hidden" name="patin_retractil" value="{{ old('patin_retractil', $patin_retractil) }}">

    <!-- este grupo en  la bd se guarda en la tabla "tipos_puertas" -->
    <input type="hidden" name="tipo_puerta" value="{{ old('tipo_puerta', $tipo_puerta) }}">

    <!-- este grupo en  la bd se guarda en la tabla "detalles_puertas" -->
    <input type="hidden" name="puerta_marca" value="{{ old('puerta_marca', $puerta_marca) }}">
    <input type="hidden" name="puerta_voltaje" value="{{ old('puerta_voltaje', $puerta_voltaje) }}">

    <!-- este grupo en  la bd se guarda en la tabla "accesos" -->
    <input type="hidden" name="accesos" value="{{ old('accesos', $accesos) }}">

    <!-- esto no se guarda en bd, es solo para lógica -->
    <input type="hidden" name="vista" value="{{ old('vista', $vista) }}">

    <!-- este grupo en la bd se guarda en la tabla "detalles_generales" -->
    <input type="hidden" name="tipo_botonera" value="{{ old('tipo_botonera', $tipo_botonera) }}">
    <input type="hidden" name="paradas" value="{{ old('paradas', $paradas) }}">
    <input type="hidden" name="subsuelos" value="{{ old('subsuelos', $subsuelos) }}">
    <input type="hidden" name="placa_cabina" value="{{ old('placa_cabina', $placa_cabina) }}">
    <input type="hidden" name="indicador_cabina" value="{{ old('indicador_cabina', $indicador_cabina) }}">
    <input type="hidden" name="indicador_pb" value="{{ old('indicador_pb', $indicador_pb) }}">
    <input type="hidden" name="indicador_palier" value="{{ old('indicador_palier', $indicador_palier) }}">

    <!-- este grupo en la bd se guarda en la tabla "habilitaciones_accesos" -->
    <input type="hidden" name="estadoBotones" value="{{ old('estadoBotones', htmlspecialchars(json_encode($estadoBotones), ENT_QUOTES, 'UTF-8')) }}">



    <style>/* Estilos para la tabla madre */
/* Estilos para la tabla madre */
.tabla-madre {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    border-top: 1px solid #000;
    border-left: 1px solid #000;
    border-radius: 30px;
    overflow: hidden;
    margin-bottom: 3.3rem;
    font-family: "Inter", sans-serif;
}

.tabla-madre td {
    border-bottom: 1px solid #000;
    border-right: 1px solid #000;
    padding: 13px;
    padding-inline: 20px;
    padding-left: 40px;
    text-align: left;
}

.tabla-madre td:first-child {
    width: 40%;
    padding-left: 2.8rem;
    color: #004991;
    font-weight: 700;
}

.tabla-madre td:last-child {
    width: 60%;
    padding-left: 1.8rem!important; /* Puedes ajustar este valor según tus necesidades */
}

.tabla-madre tr:first-child td:first-child {
    border-top-left-radius: 29px;
}

.tabla-madre tr:first-child td:last-child {
    border-top-right-radius: 29px;
}

.tabla-madre tr:last-child td:first-child {
    border-bottom-left-radius: 29px;
}

.tabla-madre tr:last-child td:last-child {
    border-bottom-right-radius: 29px;
}

/* Estilos para centrar la tabla hija */
.tabla-hija-container {
    display: flex;
    justify-content: center;  /* Centra horizontalmente */
    align-items: center;      /* Centra verticalmente */
    width: 100%;
    margin-left: -0.8rem;
}

/* Estilos para la tabla hija */
.tabla-hija {
    width: auto; /* Ajusta el ancho automáticamente */
    border-collapse: collapse;
}

.tabla-hija th,
.tabla-hija td {
    text-align: center;
    padding-inline: 1.8rem;
    padding-block: 1rem;
    margin: 0;
    border: none;
    width: 33.33%; /* Asegura que todas las columnas tengan el mismo ancho */
}

.botonRojo,
.botonVerde {
    display: block;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.botonRojo {
    background-color: red;
    color: transparent;
}

.botonVerde {
    background-color: green;
    color: transparent;
}

/* Elimina márgenes entre filas */
.tableEstado tbody tr {
    display: flex;
    margin: 0;
    padding: 0;
}

.tableEstado tbody tr td {
    padding: 0;
    margin: 0;
}

.tabla-hija td {
    padding: 0;
}

.tabla-hija td:first-child {
    padding: 0;
}

.tabla-madre td:last-child {
    padding: 0;
}

.tdPiso {
    font-size: 19px;
}

.thEstado {
    font-size: 19px;
}

.thPiso {
    font-size: 19px;    
}

 </style>

    <table class="tabla-madre">
        <p class="titulo_resumen" >Datos básicos</p>
        <tr>
            <td>Empresa</td>
            <td>{{$nombre_empresa}}</td>
        </tr>
        <tr>
            <td>Email empresa</td>
            <td>{{$email_empresa}}</td>
        </tr>
        <tr>
            <td>Teléfono empresa</td>
            <td>{{$telefono_empresa}}</td>
        </tr>
        <tr>
            <td>Dirección de obra</td>
            <td>{{$direccion_obra}}</td>
        </tr>
        <tr>
            <td>Tipo de obra</td>
            <td>{{$tipo_obra_nombre}}</td>
        </tr>
        <tr>
            <td>Tipo de funcionamiento</td>
            <td>{{$tipo_funcionamiento_nombre}}</td>
        </tr>
        <tr>
            <td>Tipo de control</td>
            <td>{{$tipo_control_nombre}}</td>
        </tr>
    </table>


    <table class="tabla-madre">
        <p class="titulo_resumen" >Motor</p>
        <tr>
            <td>Potencia de motor</td>
            <td>{{$motor_potencia}}</td>
        </tr>
        <tr>
            <td>Marca de motor</td>
            <td>{{$motor_marca}}</td>
        </tr>
        <tr>
            <td>Voltaje de motor</td>
            <td>{{$motor_voltaje}}</td>
        </tr>
        <tr>
            <td>Encoder</td>
            <td>{{$motor_encoder}}</td>
        </tr>
        <tr>
            <td>Rescate</td>
            <td>@if ($motor_rescate == 0) No @endif
                @if ($motor_rescate == 1) Sí @endif</td>
        </tr>
    </table>

    <table class="tabla-madre">
        <p class="titulo_resumen" >Puertas</p>
        <tr>
            <td>Tipo de puerta</td>
            <td>{{$tipo_puerta}}</td>
        </tr>
        <tr>
            <td>Marca de puerta</td>
            <td>{{$puerta_marca}}</td>
        </tr>
        <tr>
            <td>Voltaje de puerta</td>
            <td>{{$puerta_voltaje}}</td>
        </tr>
        <tr>
            <td>Patin retráctil</td>
            <td>{{$patin_retractil}}</td>
        </tr>
    </table>

    <table class="tabla-madre">
        <p class="titulo_resumen" >Acceso</p>
        <tr>
            <td>Tipo de acceso</td>
            <td>{{$accesos}}</td>
        </tr>
        <tr>
            <td>Paradas</td>
            <td>{{$paradas}}</td>
        </tr>
        <tr>
            <td>Subsuelos</td>
            <td>{{$subsuelos}}</td>
        </tr>
    </table>

  
<?php

$jsonString = $estadoBotones;


// Convertir las entidades HTML de nuevo a caracteres normales
$jsonString = html_entity_decode($jsonString);

// Reemplazar comillas dobles por simples para facilitar el manejo de cadenas JSON
$jsonString = str_replace('&quot;', '"', $jsonString);

// Decodificar el JSON a un array asociativo usando json_decode
$data = json_decode($jsonString, true);

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error al decodificar el JSON.';
} else {
    
}

?>


<input type="hidden" name="data" value="{{ old('data', json_encode($data)) }}">

<!-- Tabla Madre con Tabla Hija -->
<table class="tabla-madre">
    <p class="titulo_resumen">Habilitaciones de acceso</p>
    <tr>
        <td colspan="2">
            <div class="tabla-hija-container">
                <table class="tabla-hija">
                    <thead>
                        <tr>
                            <th class="thEstado">A</th>
                            <th class="thPiso">Piso</th>
                            <th class="thEstado">B</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dato)
                        <tr>
                            <td class="tdEstado">
                                @if ($dato['salida_a'] == 0)
                                    <div><img src="http://localhost/industriasop/resources/img/cerrar.png" width="21px"></div>
                                @else
                                    <div><img src="http://localhost/industriasop/resources/img/controlar.png" width="30px"></div>
                                @endif
                            </td>
                            <td class="tdPiso">
                                @if ($dato['piso'] === "PB")
                                    PB
                                @else
                                    {{ $dato['piso'] }}
                                @endif
                            </td>
                            <td class="tdEstado">
                                @if ($dato['salida_b'] == 0)
                                    <div><img style="margin-left: -1.6rem;" src="http://localhost/industriasop/resources/img/cerrar.png" width="21px"></div>
                                @else
                                    <div><img style="margin-left: -1.6rem;" src="http://localhost/industriasop/resources/img/controlar.png" width="30px"></div>
                                @endif
                            </td>
                        </tr>
                        <!-- Fila vacía -->
                        <tr class="fila-vacia">
                            <td colspan="3"><br></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>




    <table class="tabla-madre">
        <p class="titulo_resumen">Detalles generales</p>
        <tr>
            <td>Placa cabina</td>
            <td>@if ($placa_cabina == 0) No @endif
                @if ($placa_cabina == 1) Sí @endif</td>
        </tr>
        <tr>
            <td>Indicador de cabina</td>
            <td>@if ($indicador_cabina == 0) No @endif
                @if ($indicador_cabina == 1) Sí @endif</td>
        </tr>
        <tr>
            <td>Indicador de Planta Baja</td>
            <td>@if ($indicador_pb == 0) No @endif
                @if ($indicador_pb == 1) Sí @endif</td>
        </tr>
        <tr>
            <td>Indicador de palier</td>
            <td>@if ($indicador_palier == 0) No @endif
                @if ($indicador_palier == 1) Sí @endif</td>
        </tr>
    </table>



<div class="container">
          <div class="boton-izquierdo">
            <div class="btnPrev">
              <button type="button" onclick="window.history.back()">Anterior</button>
            </div>
          </div>

          <div class="boton-derecho">
            <div class="btnNext">
              <button type="submit">Enviar</button>
            </div>
          </div>
        </div>  
    
  </form>
</div>

</div>

</div>


<?php include '../resources/views/new/includes/footer.blade.php'; ?>

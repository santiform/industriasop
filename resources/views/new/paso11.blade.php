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

  <h2 class="titleSection"> <div class="div-paso">4</div> Detalles generales</h2>  

  <form action="{{ route('newPaso11') }}" method="POST">
    @csrf


    <!-- este grupo en  la bd se guarda en la tabla "pedidos" -->
    <input type="hidden" name="email_empresa" value="<?php echo htmlspecialchars($email_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="nombre_empresa" value="<?php echo htmlspecialchars($nombre_empresa, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="direccion_obra" value="<?php echo htmlspecialchars($direccion_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_obra" value="<?php echo htmlspecialchars($tipo_obra, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_funcionamiento" value="<?php echo htmlspecialchars($tipo_funcionamiento, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="tipo_control" value="<?php echo htmlspecialchars($tipo_control, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "motores" -->
    <input type="hidden" name="motor_potencia" value="<?php echo htmlspecialchars($motor_potencia, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_marca" value="<?php echo htmlspecialchars($motor_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_voltaje" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="motor_encoder" value="<?php echo htmlspecialchars($motor_voltaje, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "tipos_puertas" -->
    <input type="hidden" name="tipo_puerta" value="<?php echo htmlspecialchars($tipo_puerta, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "detalles_puertas" -->
    <input type="hidden" name="puerta_marca" value="<?php echo htmlspecialchars($puerta_marca, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="puerta_voltaje" value="<?php echo htmlspecialchars($puerta_voltaje, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en  la bd se guarda en la tabla "accesos" -->
    <input type="hidden" name="accesos" value="<?php echo htmlspecialchars($accesos, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "detalles_generales" -->
    <input type="hidden" name="tipo_botonera" value="<?php echo htmlspecialchars($tipo_botonera, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="paradas" value="<?php echo htmlspecialchars($paradas, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="subsuelos" value="<?php echo htmlspecialchars($subsuelos, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="placa_cabina" value="<?php echo htmlspecialchars($placa_cabina, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="indicador_cabina" value="<?php echo htmlspecialchars($indicador_cabina, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="indicador_pb" value="<?php echo htmlspecialchars($indicador_pb, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="hidden" name="indicador_palier" value="<?php echo htmlspecialchars($indicador_palier, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- este grupo en la bd se guarda en la tabla "habilitaciones_accesos" -->
    <input type="hidden" name="estadoBotones" value="{{ htmlspecialchars(json_encode($estadoBotones), ENT_QUOTES, 'UTF-8') }}">


    <style>
        table {
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
        td {
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
            padding: 13px;
            padding-inline: 20px;
            padding-left: 40px;
            text-align: left;
        }

        td:first-child {
            width: 40%;
            padding-left: 2.8rem;
            color: #004991;
            font-weight: 700;
        }
        td:last-child {
            width: 60%;
            padding-left: 2rem;
        }
        /* Para evitar que los bordes de las celdas oculten el borde redondeado de la tabla */
        table tr:first-child td:first-child {
            border-top-left-radius: 29px;
        }
        table tr:first-child td:last-child {
            border-top-right-radius: 29px;
        }
        table tr:last-child td:first-child {
            border-bottom-left-radius: 29px;
        }
        table tr:last-child td:last-child {
            border-bottom-right-radius: 29px;
        }
    </style>

    <table>
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
            <td>Dirección de obra</td>
            <td>{{$direccion_obra}}</td>
        </tr>
        <tr>
            <td>Tipo de obra</td>
            <td>{{$tipo_obra}}</td>
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


    <table>
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
    </table>




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

<?php include '../resources/views/new/includes/footer.blade.php'; ?>

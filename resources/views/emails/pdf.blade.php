<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    </head>
    </head>

    <style>
        @import url("https://use.typekit.net/biu5kds.css");
        @import url('https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&family=Michroma&display=swap');
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            
            border-color: none;
            overflow: hidden;
            margin-bottom: 3.3rem;
            font-family: "Inter", sans-serif;
        }
        td {
            border: 1px solid #000;
            border-top: none;
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
            border-right: none;
        }
        td:last-child {
            width: 60%;
            padding-left: 2rem;
        }
        /* Para evitar que los bordes de las celdas oculten el borde redondeado de la tabla */
        table tr:first-child td:first-child {
            border-top-left-radius: 29px;
            border: 1px solid #000;
            border-right: none;
        }
        table tr:first-child td:last-child {
            border-top-right-radius: 29px;
            border: 1px solid #000;
        }
        table tr:last-child td:first-child {
            border-bottom-left-radius: 29px;

        }
        table tr:last-child td:last-child {
            border-bottom-right-radius: 29px;

        }
        .tabla-hija {
            border: none!important;
            margin-left: -1rem!important;
        }
        .trEstado {
            margin-block: 1rem!important;
            border: none!important;

        }
        .thEstado {
            margin-block: 1rem!important;
            border: none!important;
        }
        .thPiso {
            margin-block: 1rem!important;
            border: none!important;
        }
        .tdPiso{
            border: none!important;
            padding-right: 2.8rem!important;
            font-weight: 700;
            text-align: center;
        }
        .tdEstado {
            border: none!important;
        }
        .titulo_resumen {
          font-weight: 800;
          color: #004991;
          font-family: "Inter", sans-serif;
          font-size: 20px;
          margin-left: 1rem;
          margin-bottom: 2rem;
        }
    </style>

    <table style="margin-top: -2rem!important;">
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
        <tr>
            <td>Rescate</td>
            <td>@if ($motor_rescate == 0) No @endif
                @if ($motor_rescate == 1) Sí @endif</td>
        </tr>
    </table>

    <table>
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

    <table>
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


        <table>
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

    <br><br>


    <table style="margin: 0; padding: 0; ">
        <tr>
            <td>Habilitaciones de accesos</td>
            <td><table class="tabla-hija">
                    <thead>
                        <tr>
                            <th class="thEstado">A</th>
                            <th class="thPiso">Piso</th>
                            <th class="thEstado">B</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dato)
                        <tr class="trEstado">
                            <td class="tdEstado">
                                @if ($dato['salida_a'] == 0)
                                    <div><img style="margin-left: 1.2rem;" src="http://localhost/industriasop/resources/img/cerrar.png" width="21px"></div>
                                @else
                                    <div><img style="margin-left: 1rem;" src="http://localhost/industriasop/resources/img/controlar.png" width="30px"></div>
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
                                    <div><img style="margin-left: 1.1rem;" src="http://localhost/industriasop/resources/img/cerrar.png" width="21px"></div>
                                @else
                                    <div><img style="margin-left: 0.9rem;" src="http://localhost/industriasop/resources/img/controlar.png" width="30px"></div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table></td>
        </tr>
    </table>





</body>
</html>
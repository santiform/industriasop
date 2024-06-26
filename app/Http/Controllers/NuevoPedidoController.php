<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; 


use App\Mail\MiCorreoConAdjunto;
use Illuminate\Support\Facades\Mail;

use Dompdf\Dompdf;
use PDF;

class NuevoPedidoController extends Controller
{
    
    public function newOrder() {

        $tipos_obras = DB::table('tipos_obras')->get();
        $tipos_funcionamientos = DB::table('tipos_funcionamientos')->get();

        return view('new.index', compact('tipos_obras', 'tipos_funcionamientos'));

    }

    public function paso2(Request $request) {
       
        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
        $direccion_obra = $request->input('direccion');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipos_controles = DB::table('tipos_controles')
                    ->where('id_tipo_funcionamiento', $tipo_funcionamiento)
                    ->select('id', 'nombre')
                    ->get();        

        return view('new.paso2', [
            'nombre_empresa' => $nombre_empresa,
            'email_empresa' => $email_empresa,
            'telefono_empresa' => $telefono_empresa,
            'direccion_obra' => $direccion_obra,
            'tipo_obra' => $tipo_obra,
            'tipo_funcionamiento' => $tipo_funcionamiento,
            'tipos_controles' => $tipos_controles,
        ]);

    }


    public function paso3(Request $request) {
        
        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');

        dd($motor_marca, $motor_voltaje);

        if ($tipo_control == 8 || $tipo_control == 9 || $tipo_control == 10) {    
            return view('new.paso3', [
                'nombre_empresa' => $nombre_empresa,
                'email_empresa' => $email_empresa,
                'telefono_empresa' => $telefono_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
            ]);
        } 

        $motor_encoder = null;
        $motor_rescate = null;
          
         // Almacena los datos en la sesión
        $request->session()->put('datos', [
            'email_empresa' => $email_empresa,
            'nombre_empresa' => $nombre_empresa,
            'direccion_obra' => $direccion_obra,
            'tipo_obra' => $tipo_obra,
            'tipo_funcionamiento' => $tipo_funcionamiento,
            'tipo_control' => $tipo_control,
            'motor_potencia' => $motor_potencia,
            'motor_marca' => $motor_marca,
            'motor_voltaje' => $motor_voltaje,
            'motor_encoder' => $motor_encoder,
            'motor_rescate' => $motor_rescate,
        ]);

        // Redirige al siguiente paso
        return redirect()->action([NuevoPedidoController::class, 'newPaso5int']);
        
    }

    public function paso4(Request $request) {

        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');

        if ($tipo_control == 9 || $tipo_control == 10) {

            $motor_rescate = null;

            return view('new.paso5mecanico', [
                'nombre_empresa' => $nombre_empresa,
                'email_empresa' => $email_empresa,
                'telefono_empresa' => $telefono_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
                'motor_encoder' => $motor_encoder,
                'motor_rescate' => $motor_rescate,
            ]);

        }

        return view('new.paso4', [
                'nombre_empresa' => $nombre_empresa,
                'email_empresa' => $email_empresa,
                'telefono_empresa' => $telefono_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
                'motor_encoder' => $motor_encoder,
            ]);

    }


    public function newPaso5int(Request $request)
    {
        // Obtener los datos de la sesión
        $datos = $request->session()->get('datos');

        return view('new.newPaso5int', compact('datos'));
    }


    public function paso5(Request $request) {

        // Recupera los datos de la sesión
        $datos_obra = $request->session()->get('datos');

        $nombre_empresa = $datos_obra['nombre_empresa'] ?? null;
        $email_empresa = $datos_obra['email_empresa'] ?? null;
        $telefono_empresa = $datos_obra['telefono_empresa'] ?? null;
        $direccion_obra = $datos_obra['direccion_obra'] ?? null;
        $tipo_obra = $datos_obra['tipo_obra'] ?? null;
        $tipo_funcionamiento = $datos_obra['tipo_funcionamiento'] ?? null;

        $tipo_control = $datos_obra['tipo_control'] ?? null;
        $motor_potencia = $datos_obra['motor_potencia'] ?? null;
        $motor_marca = $datos_obra['motor_marca'] ?? null;
        $motor_voltaje = $datos_obra['motor_voltaje'] ?? null;
        $motor_encoder = $datos_obra['motor_encoder'] ?? null;
        $motor_rescate = $datos_obra['motor_rescate'] ?? null;

        $tipo_control_2 = $request->input('tipo_control');

        if ($tipo_control_2 !== null) {    
            $nombre_empresa = $request->input('nombre_empresa');
            $email_empresa = $request->input('email_empresa');
            $telefono_empresa = $request->input('telefono_empresa');
            $direccion_obra = $request->input('direccion_obra');
            $tipo_obra = $request->input('tipo_obra');
            $tipo_funcionamiento = $request->input('tipo_funcionamiento');

            $tipo_control = $request->input('tipo_control');
            $motor_potencia = $request->input('motor_potencia');
            $motor_marca = $request->input('motor_marca');
            $motor_voltaje = $request->input('motor_voltaje');
            $motor_encoder = $request->input('motor_encoder');
            $motor_rescate = $request->input('motor_rescate');
        }

        if ($tipo_control == 1 || $tipo_control == 2) { 
            return view('new.paso5hidrauA', [
                'nombre_empresa' => $nombre_empresa,
                'email_empresa' => $email_empresa,
                'telefono_empresa' => $telefono_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
                'motor_encoder' => $motor_encoder,
                'motor_rescate' => $motor_rescate,
            ]);
        }  


        if ($tipo_control == 3 || $tipo_control == 4 || $tipo_control == 5) { 
            return view('new.paso5hidrauB', [
                'nombre_empresa' => $nombre_empresa,
                'email_empresa' => $email_empresa,
                'telefono_empresa' => $telefono_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
                'motor_encoder' => $motor_encoder,
                'motor_rescate' => $motor_rescate,
            ]);
        }   


        return view('new.paso5mecanico', [
                'nombre_empresa' => $nombre_empresa,
                'email_empresa' => $email_empresa,
                'telefono_empresa' => $telefono_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
                'motor_encoder' => $motor_encoder,
                'motor_rescate' => $motor_rescate,
            ]);



    }






    public function paso6(Request $request) {

        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        $tipo_puerta = $request->input('tipo_puerta');

        if ($tipo_control == 5) { 
            return view('new.paso6manualB', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,
                ]);
        }


        if ($tipo_puerta == "AUTOMÁTICAS") { 
            return view('new.paso6automatico', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,
                ]);
        }

        if (($tipo_puerta == "MANUALES" || $tipo_puerta == "SEMIAUTOMÁTICAS") && ($tipo_control == 1 || $tipo_control == 2
        || $tipo_control == 6 || $tipo_control == 7)) { 
            return view('new.paso6manualA', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,
                ]);
        }

        if (($tipo_puerta == "MANUALES" || $tipo_puerta == "SEMIAUTOMÁTICAS") && ($tipo_control == 3 || $tipo_control == 4
         || $tipo_control == 8 || $tipo_control == 9 || $tipo_control == 10)) { 
            return view('new.paso6manualB', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,
                ]);
        }



        return view('new.paso6manualA', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,
                ]);


    }



    public function paso7(Request $request) {

        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        $tipo_puerta = $request->input('tipo_puerta');

        $puerta_marca = $request->input('puerta_marca');
        $puerta_voltaje = $request->input('puerta_voltaje');
        $patin_retractil = $request->input('patin_retractil');

        if ($tipo_control == 5) { 

            $accesos = "TRIPLE";

            return view('new.paso8', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,
                    'accesos' => $accesos,
                ]);
        }

        
            return view('new.paso7', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,
                ]);


    }






    public function paso8(Request $request) {

        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        $tipo_puerta = $request->input('tipo_puerta');

        $puerta_marca = $request->input('puerta_marca');
        $puerta_voltaje = $request->input('puerta_voltaje');
        $patin_retractil = $request->input('patin_retractil');

        $accesos = $request->input('accesos');

        
            return view('new.paso8', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,

                    'accesos' => $accesos,
                ]);


    }



    public function paso9(Request $request) {

        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        $tipo_puerta = $request->input('tipo_puerta');

        $puerta_marca = $request->input('puerta_marca');
        $puerta_voltaje = $request->input('puerta_voltaje');
        $patin_retractil = $request->input('patin_retractil');

        $accesos = $request->input('accesos');

        $paradas = $request->input('paradas');
        $subsuelos = $request->input('subsuelos');

        $tipo_botonera = $request->input('tipo_botonera');

        if ($accesos == "SIMPLE") { 
            return view('new.paso9simple', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,

                    'accesos' => $accesos,

                    'tipo_botonera' => $tipo_botonera,
                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,
                ]);
        }   


        if ($accesos == "DOBLE" && $tipo_botonera == 1) { 
            return view('new.paso9dobleA', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,

                    'accesos' => $accesos,

                    'tipo_botonera' => $tipo_botonera,
                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,
                ]);
        }     


        if ($tipo_botonera == 2) { 
            return view('new.paso9dobleAyB', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,

                    'accesos' => $accesos,

                    'tipo_botonera' => $tipo_botonera,
                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,
                ]);
        }   




        $vista =  null;
        $estadoBotones = null;
        return view('new.paso10', [ 
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,

                    'accesos' => $accesos,

                    'tipo_botonera' => $tipo_botonera,
                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,

                    'vista' => $vista,
                    'estadoBotones' => $estadoBotones,
                ]);



    }






    public function paso10(Request $request) {

        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        $tipo_puerta = $request->input('tipo_puerta');

        $puerta_marca = $request->input('puerta_marca');
        $puerta_voltaje = $request->input('puerta_voltaje');
        $patin_retractil = $request->input('patin_retractil');

        $accesos = $request->input('accesos');

        $tipo_botonera = $request->input('tipo_botonera');
        $paradas = $request->input('paradas');
        $subsuelos = $request->input('subsuelos');

        $vista = $request->input('vista');

        if ($vista == "simple") {
            // Obtén los datos del formulario
            $estadoBotones = $request->input('estadoBotones');
        }

        if ($vista == "dobleA") {
            // Obtén los datos del formulario
            $datosFormulario = $request->input('datosFormulario');

            // Decodifica el JSON
            $estadoBotones = json_decode($datosFormulario, true);
        }

        if ($vista == "dobleAyB") {
            // Obtén los datos del formulario
            $datosFormulario = $request->input('estadoBotonesJson');

            // Decodifica el JSON
            $estadoBotones = json_decode($datosFormulario, true);
        }


        return view('new.paso10', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,

                    'accesos' => $accesos,

                    'tipo_botonera' => $tipo_botonera,
                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,

                    'vista' => $vista,
                    'estadoBotones' => $estadoBotones,
                ]);

    
    }



    public function paso11(Request $request) {

        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        $tipo_puerta = $request->input('tipo_puerta');

        $puerta_marca = $request->input('puerta_marca');
        $puerta_voltaje = $request->input('puerta_voltaje');
        $patin_retractil = $request->input('patin_retractil');

        $accesos = $request->input('accesos');

        $tipo_botonera = $request->input('tipo_botonera');
        $paradas = $request->input('paradas');
        $subsuelos = $request->input('subsuelos');
        
        $estadoBotones = $request->input('estadoBotones');

        $vista = $request->input('vista');

        $placa_cabina = $request->input('placa_cabina');
        $indicador_cabina = $request->input('indicador_cabina');
        $indicador_pb = $request->input('indicador_pb');
        $indicador_palier = $request->input('indicador_palier');

        $tipo_funcionamiento_nombre = DB::table('tipos_funcionamientos')->where('id', $tipo_funcionamiento)->value('nombre');
        $tipo_control_nombre = DB::table('tipos_controles')->where('id', $tipo_control)->value('nombre');


        return view('new.paso11', [
                    'nombre_empresa' => $nombre_empresa,
                    'email_empresa' => $email_empresa,
                    'telefono_empresa' => $telefono_empresa,
                    'direccion_obra' => $direccion_obra,
                    'tipo_obra' => $tipo_obra,
                    'tipo_funcionamiento' => $tipo_funcionamiento,

                    'tipo_control' => $tipo_control,
                    'motor_potencia' => $motor_potencia,
                    'motor_marca' => $motor_marca,
                    'motor_voltaje' => $motor_voltaje,
                    'motor_encoder' => $motor_encoder,
                    'motor_rescate' => $motor_rescate,

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                    'patin_retractil' => $patin_retractil,

                    'accesos' => $accesos,

                    'tipo_botonera' => $tipo_botonera,
                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,

                    'vista' => $vista,
                    'estadoBotones' => $estadoBotones,

                    'placa_cabina' => $placa_cabina,
                    'indicador_cabina' => $indicador_cabina,
                    'indicador_pb' => $indicador_pb,
                    'indicador_palier' => $indicador_palier,





                    'tipo_funcionamiento_nombre' => $tipo_funcionamiento_nombre,
                    'tipo_control_nombre' => $tipo_control_nombre,

                ]);

    
    }




    public function enviarCorreoConAdjunto(Request $request)
    {
        $nombre_empresa = $request->input('nombre_empresa');
        $email_empresa = $request->input('email_empresa');
        $telefono_empresa = $request->input('telefono_empresa');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');
        $tipo_control = $request->input('tipo_control');

        $id_estado = 1;

        DB::table('pedidos')->insert([
            'id_tipo_obra' => $tipo_obra,
            'id_tipo_funcionamiento' => $tipo_funcionamiento,
            'id_tipo_control' => $tipo_control,
            'id_estado' => $id_estado,
            'nombre' => $nombre_empresa,
            'email' => $email_empresa,
            'telefono' => $telefono_empresa,
            'direccion_obra' => $direccion_obra,
            'created_at' => Now(),
        ]);

        
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        $id_pedido = DB::table('pedidos')
                    ->orderBy('id', 'desc')
                    ->first();

        DB::table('motores')->insert([
            'id_pedido' => $id_pedido,
            'marca' => $motor_marca,
            'potencia' => $motor_potencia,
            'voltaje' => $motor_voltaje,
            'encoder' => $motor_encoder,
            'rescate' => $motor_rescate,
            'created_at' => Now(),
        ]);

        $tipo_puerta = $request->input('tipo_puerta');

        DB::table('tipos_puertas')->insert([
            'id_tipo_control' => $tipo_control,
            'nombre' => $tipo_puerta,
            'created_at' => Now(),
        ]);

        $puerta_marca = $request->input('puerta_marca');
        $puerta_voltaje = $request->input('puerta_voltaje');

        $accesos = $request->input('accesos');

        $tipo_botonera = $request->input('tipo_botonera');
        $paradas = $request->input('paradas');
        $subsuelos = $request->input('subsuelos');
        
        $estadoBotones = $request->input('estadoBotones');

        $vista = $request->input('vista');

        $placa_cabina = $request->input('placa_cabina');
        $indicador_cabina = $request->input('indicador_cabina');
        $indicador_pb = $request->input('indicador_pb');
        $indicador_palier = $request->input('indicador_palier');

        $tipo_funcionamiento_nombre = DB::table('tipos_funcionamientos')->where('id', $tipo_funcionamiento)->value('nombre');
        $tipo_control_nombre = DB::table('tipos_controles')->where('id', $tipo_control)->value('nombre');

        $variables = [
            'nombre_empresa' => $nombre_empresa,
            'email_empresa' => $email_empresa,
            'telefono_empresa' => $telefono_empresa,
            'direccion_obra' => $direccion_obra,
            'tipo_obra' => $tipo_obra,
            'tipo_funcionamiento' => $tipo_funcionamiento,
            'tipo_funcionamiento_nombre' => $tipo_funcionamiento_nombre,
            'tipo_control' => $tipo_control,
            'tipo_control_nombre' => $tipo_control_nombre,
            'motor_potencia' => $motor_potencia,
            'motor_marca' => $motor_marca,
            'motor_voltaje' => $motor_voltaje,
            'motor_encoder' => $motor_encoder,
            'motor_rescate' => $motor_rescate,
            'tipo_puerta' => $tipo_puerta,
            'puerta_marca' => $puerta_marca,
            'puerta_voltaje' => $puerta_voltaje,
            'accesos' => $accesos,
            'tipo_botonera' => $tipo_botonera,
            'paradas' => $paradas,
            'subsuelos' => $subsuelos,
            'estadoBotones' => $estadoBotones,
            'vista' => $vista,
            'placa_cabina' => $placa_cabina,
            'indicador_cabina' => $indicador_cabina,
            'indicador_pb' => $indicador_pb,
            'indicador_palier' => $indicador_palier,
        ];

        // Generar el PDF
        $pdf = PDF::loadView('emails.pdf', $variables);
        $pdfPath = storage_path('app/public/documento.pdf');
        $pdf->save($pdfPath);

        // Nombre del pdf
        $archivoPdf = "documento.pdf";

        // Enviar el correo con el PDF adjunto
        Mail::to('santiform@gmail.com')->send(new MiCorreoConAdjunto($archivoPdf));
        Mail::to('divoxsoluciones@gmail.com')->send(new MiCorreoConAdjunto($archivoPdf));

        return "Correo con adjunto enviado con éxito!";
    }






    protected function generarPDF($archivoPdf)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml();
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        file_put_contents(storage_path('app/public/' . $archivoPdf), $dompdf->output());
    }



   

}

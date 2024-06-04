<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; 

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
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipos_controles = DB::table('tipos_controles')
                    ->where('id_tipo_funcionamiento', $tipo_funcionamiento)
                    ->select('id', 'nombre')
                    ->get();        

        return view('new.paso2', [
            'email_empresa' => $email_empresa,
            'nombre_empresa' => $nombre_empresa,
            'direccion_obra' => $direccion_obra,
            'tipo_obra' => $tipo_obra,
            'tipo_funcionamiento' => $tipo_funcionamiento,
            'tipos_controles' => $tipos_controles,
        ]);

    }


    public function paso3(Request $request) {
        
        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');

        if ($tipo_control == 8 || $tipo_control == 9|| $tipo_control == 10) {    
            return view('new.paso3', [
                'email_empresa' => $email_empresa,
                'nombre_empresa' => $nombre_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
            ]);
        } 
          
            return view('new.paso4', [
                'email_empresa' => $email_empresa,
                'nombre_empresa' => $nombre_empresa,
                'direccion_obra' => $direccion_obra,
                'tipo_obra' => $tipo_obra,
                'tipo_funcionamiento' => $tipo_funcionamiento,

                'tipo_control' => $tipo_control,
                'motor_potencia' => $motor_potencia,
                'motor_marca' => $motor_marca,
                'motor_voltaje' => $motor_voltaje,
            ]);
        

    }

    public function paso4(Request $request) {

        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');

        return view('new.paso4', [
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
            ]);

    }


    public function paso5(Request $request) {

        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
        $direccion_obra = $request->input('direccion_obra');
        $tipo_obra = $request->input('tipo_obra');
        $tipo_funcionamiento = $request->input('tipo_funcionamiento');

        $tipo_control = $request->input('tipo_control');
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        if ($tipo_control == 1 || $tipo_control == 2) { 
            return view('new.paso5hidrauA', [
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
        }  

        if ($tipo_control == 3 || $tipo_control == 4 || $tipo_control == 5) { 
            return view('new.paso5hidrauB', [
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
        }   


    }






    public function paso6(Request $request) {

        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
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

        if ($tipo_puerta == "AUTOMÁTICAS") { 
            return view('new.paso6automatico', [
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

                    'tipo_puerta' => $tipo_puerta,
                ]);
        } 

    }



    public function paso7(Request $request) {

        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
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

        
            return view('new.paso7', [
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

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,
                ]);


    }






    public function paso8(Request $request) {

        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
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

        $accesos = $request->input('accesos');

        
            return view('new.paso8', [
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

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,

                    'accesos' => $accesos,
                ]);


    }



    public function paso9(Request $request) {

        $nombre_empresa = $request->input('nombre');
        $email_empresa = $request->input('email');
        $telefono_empresa = $request->input('telefono');
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

        $accesos = $request->input('accesos');

        $paradas = $request->input('paradas');
        $subsuelos = $request->input('subsuelos');

        $tipo_botonera = $request->input('tipo_botonera');

        if ($accesos == "SIMPLE") { 
            return view('new.paso9simple', [
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

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,

                    'accesos' => $accesos,

                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,
                ]);
        }   


        if ($accesos == "DOBLE" && $tipo_botonera == 1) { 
            return view('new.paso9dobleA', [
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

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,

                    'accesos' => $accesos,

                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,
                ]);
        }     


        if ($tipo_botonera == 2) { 
            return view('new.paso9dobleAyB', [
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

                    'tipo_puerta' => $tipo_puerta,

                    'puerta_marca' => $puerta_marca,
                    'puerta_voltaje' => $puerta_voltaje,

                    'accesos' => $accesos,

                    'paradas' => $paradas,
                    'subsuelos' => $subsuelos,
                ]);
        }   


    }




   

}

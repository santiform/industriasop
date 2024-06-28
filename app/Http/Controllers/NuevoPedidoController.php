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
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre' => 'required|string',
        'email' => 'required|email',
        'telefono' => 'required|string',
        'direccion' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre'];
    $email_empresa = $validatedData['email'];
    $telefono_empresa = $validatedData['telefono'];
    $direccion_obra = $validatedData['direccion'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];

    // Consulta para obtener tipos de controles
    $tipos_controles = DB::table('tipos_controles')
                        ->where('id_tipo_funcionamiento', $tipo_funcionamiento)
                        ->select('id', 'nombre')
                        ->get();        

    // Retornar la vista con los datos y tipos de controles
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
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string',
        'email_empresa' => 'required|email',
        'telefono_empresa' => 'required|string',
        'direccion_obra' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
        'tipo_control' => 'required|integer',
        'motor_potencia' => 'nullable|string', // Puedes ajustar según el tipo de dato
        'motor_marca' => 'nullable|string',    // Puedes ajustar según el tipo de dato
        'motor_voltaje' => 'nullable|string',  // Puedes ajustar según el tipo de dato
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre_empresa'];
    $email_empresa = $validatedData['email_empresa'];
    $telefono_empresa = $validatedData['telefono_empresa'];
    $direccion_obra = $validatedData['direccion_obra'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];
    $tipo_control = $validatedData['tipo_control'];
    $motor_potencia = $validatedData['motor_potencia'];
    $motor_marca = $validatedData['motor_marca'];
    $motor_voltaje = $validatedData['motor_voltaje'];

    // Verificar el tipo de control para decidir el flujo del formulario
    if ($tipo_control == 8 || $tipo_control == 9 || $tipo_control == 10) {    
        return view('new.paso3', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje'
        ));
    } 

    // Inicializar valores para motores opcionales si no son necesarios
    $motor_encoder = null;
    $motor_rescate = null;
      
    // Almacenar los datos en la sesión
    $request->session()->put('datos', [
        'email_empresa' => $email_empresa,
        'nombre_empresa' => $nombre_empresa,
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

    // Redirigir al siguiente paso
    return redirect()->action([NuevoPedidoController::class, 'newPaso5int']);
}


    public function paso4(Request $request) {
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string',
        'email_empresa' => 'required|email',
        'telefono_empresa' => 'required|string',
        'direccion_obra' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
        'tipo_control' => 'required|integer',
        'motor_potencia' => 'nullable|string',
        'motor_marca' => 'nullable|string',
        'motor_voltaje' => 'nullable|string',
        'motor_encoder' => 'nullable|string',
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre_empresa'];
    $email_empresa = $validatedData['email_empresa'];
    $telefono_empresa = $validatedData['telefono_empresa'];
    $direccion_obra = $validatedData['direccion_obra'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];
    $tipo_control = $validatedData['tipo_control'];
    $motor_potencia = $validatedData['motor_potencia'];
    $motor_marca = $validatedData['motor_marca'];
    $motor_voltaje = $validatedData['motor_voltaje'];
    $motor_encoder = $validatedData['motor_encoder'];

    // Verificar el tipo de control para decidir qué vista mostrar
    if ($tipo_control == 9 || $tipo_control == 10) {
        $motor_rescate = null;
        return view('new.paso5mecanico', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate'
        ));
    }

    return view('new.paso4', compact(
        'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
        'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
        'motor_marca', 'motor_voltaje', 'motor_encoder'
    ));
}



    public function newPaso5int(Request $request) {
    // Obtener los datos de la sesión
    $datos = $request->session()->get('datos');

    // Validar que los datos de sesión existan para evitar errores
    if (!$datos) {
        // Manejar el caso donde los datos no están disponibles, posiblemente redirigir a un paso anterior o manejar el error
        // Ejemplo:
        return redirect()->action([NuevoPedidoController::class, 'paso3'])->with('error', 'Datos faltantes. Por favor complete el formulario anterior.');
    }

    return view('new.newPaso5int', compact('datos'));
}



    public function paso5(Request $request) {
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string',
        'email_empresa' => 'required|email',
        'telefono_empresa' => 'required|string',
        'direccion_obra' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
        'tipo_control' => 'required|integer',
        'motor_potencia' => 'nullable|string',
        'motor_marca' => 'nullable|string',
        'motor_voltaje' => 'nullable|string',
        'motor_encoder' => 'nullable|string',
        'motor_rescate' => 'nullable|string',
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre_empresa'];
    $email_empresa = $validatedData['email_empresa'];
    $telefono_empresa = $validatedData['telefono_empresa'];
    $direccion_obra = $validatedData['direccion_obra'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];
    $tipo_control = $validatedData['tipo_control'];
    $motor_potencia = $validatedData['motor_potencia'];
    $motor_marca = $validatedData['motor_marca'];
    $motor_voltaje = $validatedData['motor_voltaje'];
    $motor_encoder = $validatedData['motor_encoder'];
    $motor_rescate = $validatedData['motor_rescate'];

    // Determinar qué vista mostrar según el tipo de control
    if ($tipo_control == 1 || $tipo_control == 2) {
        return view('new.paso5hidrauA', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate'
        ));
    }

    if ($tipo_control == 3 || $tipo_control == 4 || $tipo_control == 5) {
        return view('new.paso5hidrauB', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate'
        ));
    }

    return view('new.paso5mecanico', compact(
        'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
        'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
        'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate'
    ));
}







    public function paso6(Request $request) {
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string',
        'email_empresa' => 'required|email',
        'telefono_empresa' => 'required|string',
        'direccion_obra' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
        'tipo_control' => 'required|integer',
        'motor_potencia' => 'nullable|string',
        'motor_marca' => 'nullable|string',
        'motor_voltaje' => 'nullable|string',
        'motor_encoder' => 'nullable|string',
        'motor_rescate' => 'nullable|string',
        'tipo_puerta' => 'nullable|string',
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre_empresa'];
    $email_empresa = $validatedData['email_empresa'];
    $telefono_empresa = $validatedData['telefono_empresa'];
    $direccion_obra = $validatedData['direccion_obra'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];
    $tipo_control = $validatedData['tipo_control'];
    $motor_potencia = $validatedData['motor_potencia'];
    $motor_marca = $validatedData['motor_marca'] ?? null;
    $motor_voltaje = $validatedData['motor_voltaje'] ?? null;
    $motor_encoder = $validatedData['motor_encoder'] ?? null;
    $motor_rescate = $validatedData['motor_rescate'] ?? null;
    $tipo_puerta = $validatedData['tipo_puerta'];

    // Determinar qué vista mostrar según los criterios
    if ($tipo_control == 5) {
        return view('new.paso6manualB', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta'
        ));
    }

    if (($tipo_puerta == "MANUALES" || $tipo_puerta == "SEMIAUTOMÁTICAS") && ($tipo_control == 3 || $tipo_control == 4)) {
        return view('new.paso6manualB', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta'
        ));
    }

    if ($tipo_puerta == "AUTOMÁTICAS") {
        return view('new.paso6automatico', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta'
        ));
    }

    return view('new.paso6manualA', compact(
        'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
        'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
        'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta'
    ));
}




    public function paso7(Request $request) {
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string',
        'email_empresa' => 'required|email',
        'telefono_empresa' => 'required|string',
        'direccion_obra' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
        'tipo_control' => 'required|integer',
        'motor_potencia' => 'nullable|string',
        'motor_marca' => 'nullable|string',
        'motor_voltaje' => 'nullable|string',
        'motor_encoder' => 'nullable|string',
        'motor_rescate' => 'nullable|string',
        'tipo_puerta' => 'nullable|string',
        'puerta_marca' => 'nullable|string',
        'puerta_voltaje' => 'nullable|string',
        'patin_retractil' => 'nullable|string',
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre_empresa'];
    $email_empresa = $validatedData['email_empresa'];
    $telefono_empresa = $validatedData['telefono_empresa'];
    $direccion_obra = $validatedData['direccion_obra'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];
    $tipo_control = $validatedData['tipo_control'];
    $motor_potencia = $validatedData['motor_potencia'];
    $motor_marca = $validatedData['motor_marca'] ?? null;
    $motor_voltaje = $validatedData['motor_voltaje'] ?? null;
    $motor_encoder = $validatedData['motor_encoder'] ?? null;
    $motor_rescate = $validatedData['motor_rescate'] ?? null;
    $tipo_puerta = $validatedData['tipo_puerta'];
    $puerta_marca = $validatedData['puerta_marca'] ?? null;
    $puerta_voltaje = $validatedData['puerta_voltaje'] ?? null;
    $patin_retractil = $validatedData['patin_retractil'] ?? null;

    // Determinar qué vista mostrar según los criterios
    if ($tipo_control == 5) {
        $accesos = "TRIPLE";
        return view('new.paso8', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
            'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos'
        ));
    }

    return view('new.paso7', compact(
        'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
        'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
        'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
        'puerta_marca', 'puerta_voltaje', 'patin_retractil'
    ));
}







    public function paso8(Request $request) {
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string',
        'email_empresa' => 'required|email',
        'telefono_empresa' => 'required|string',
        'direccion_obra' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
        'tipo_control' => 'required|integer',
        'motor_potencia' => 'nullable|string',
        'motor_marca' => 'nullable|string',
        'motor_voltaje' => 'nullable|string',
        'motor_encoder' => 'nullable|string',
        'motor_rescate' => 'nullable|string',
        'tipo_puerta' => 'nullable|string',
        'puerta_marca' => 'nullable|string',
        'puerta_voltaje' => 'nullable|string',
        'patin_retractil' => 'nullable|string',
        'accesos' => 'nullable|string',
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre_empresa'];
    $email_empresa = $validatedData['email_empresa'];
    $telefono_empresa = $validatedData['telefono_empresa'];
    $direccion_obra = $validatedData['direccion_obra'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];
    $tipo_control = $validatedData['tipo_control'];
    $motor_potencia = $validatedData['motor_potencia'];
    $motor_marca = $validatedData['motor_marca'] ?? null;
    $motor_voltaje = $validatedData['motor_voltaje'] ?? null;
    $motor_encoder = $validatedData['motor_encoder'] ?? null;
    $motor_rescate = $validatedData['motor_rescate'] ?? null;
    $tipo_puerta = $validatedData['tipo_puerta'];
    $puerta_marca = $validatedData['puerta_marca'] ?? null;
    $puerta_voltaje = $validatedData['puerta_voltaje'] ?? null;
    $patin_retractil = $validatedData['patin_retractil'] ?? null;
    $accesos = $validatedData['accesos'];

    return view('new.paso8', compact(
        'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
        'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
        'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
        'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos'
    ));
}




    public function paso9(Request $request) {
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string',
        'email_empresa' => 'required|email',
        'telefono_empresa' => 'required|string',
        'direccion_obra' => 'required|string',
        'tipo_obra' => 'required|integer',
        'tipo_funcionamiento' => 'required|integer',
        'tipo_control' => 'required|integer',
        'motor_potencia' => 'nullable|string',
        'motor_marca' => 'nullable|string',
        'motor_voltaje' => 'nullable|string',
        'motor_encoder' => 'nullable|string',
        'motor_rescate' => 'nullable|string',
        'tipo_puerta' => 'nullable|string',
        'puerta_marca' => 'nullable|string',
        'puerta_voltaje' => 'nullable|string',
        'patin_retractil' => 'nullable|string',
        'accesos' => 'required|string',
        'tipo_botonera' => 'nullable|string',
        'paradas' => 'nullable|integer',
        'subsuelos' => 'nullable|integer',
    ]);

    // Obtener los datos validados
    $nombre_empresa = $validatedData['nombre_empresa'];
    $email_empresa = $validatedData['email_empresa'];
    $telefono_empresa = $validatedData['telefono_empresa'];
    $direccion_obra = $validatedData['direccion_obra'];
    $tipo_obra = $validatedData['tipo_obra'];
    $tipo_funcionamiento = $validatedData['tipo_funcionamiento'];
    $tipo_control = $validatedData['tipo_control'];
    $motor_potencia = $validatedData['motor_potencia'];
    $motor_marca = $validatedData['motor_marca'] ?? null;
    $motor_voltaje = $validatedData['motor_voltaje'] ?? null;
    $motor_encoder = $validatedData['motor_encoder'] ?? null;
    $motor_rescate = $validatedData['motor_rescate'] ?? null;
    $tipo_puerta = $validatedData['tipo_puerta'];
    $puerta_marca = $validatedData['puerta_marca'] ?? null;
    $puerta_voltaje = $validatedData['puerta_voltaje'] ?? null;
    $patin_retractil = $validatedData['patin_retractil'] ?? null;
    $accesos = $validatedData['accesos'];
    $tipo_botonera = $validatedData['tipo_botonera'] ?? null;
    $paradas = $validatedData['paradas'];
    $subsuelos = $validatedData['subsuelos'];

    // Determinar qué vista mostrar según las condiciones
    if ($accesos == "SIMPLE") {
        return view('new.paso9simple', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
            'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos',
            'tipo_botonera', 'paradas', 'subsuelos'
        ));
    } elseif ($accesos == "DOBLE" && $tipo_botonera == 1) {
        return view('new.paso9dobleA', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
            'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos',
            'tipo_botonera', 'paradas', 'subsuelos'
        ));
    } elseif ($tipo_botonera == 2) {
        return view('new.paso9dobleAyB', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
            'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos',
            'tipo_botonera', 'paradas', 'subsuelos'
        ));
    } else {
        return view('new.paso10', compact(
            'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
            'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
            'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
            'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos',
            'tipo_botonera', 'paradas', 'subsuelos'
        ));
    }
}







    public function paso10(Request $request) {

    // Obtener todos los datos del formulario
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
    $estadoBotones = null;

    // Procesar datos específicos según la vista seleccionada
    if ($vista == "simple") {
        // Obtén los datos del formulario específicos de 'simple'
        $estadoBotones = $request->input('estadoBotones');
    } elseif ($vista == "dobleA") {
        // Obtén los datos del formulario específicos de 'dobleA'
        $datosFormulario = $request->input('datosFormulario');
        $estadoBotones = json_decode($datosFormulario, true);
    } elseif ($vista == "dobleAyB") {
        // Obtén los datos del formulario específicos de 'dobleAyB'
        $datosFormulario = $request->input('estadoBotonesJson');
        $estadoBotones = json_decode($datosFormulario, true);
    }

    // Retornar la vista 'new.paso10' con todos los datos
    return view('new.paso10', compact(
        'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
        'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
        'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
        'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos',
        'tipo_botonera', 'paradas', 'subsuelos', 'vista', 'estadoBotones'
    ));
}




    public function paso11(Request $request) {
    // Obtener todos los datos del formulario
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

    // Obtener nombres de los tipos desde la base de datos
    $tipo_funcionamiento_nombre = DB::table('tipos_funcionamientos')->where('id', $tipo_funcionamiento)->value('nombre');
    $tipo_control_nombre = DB::table('tipos_controles')->where('id', $tipo_control)->value('nombre');
    $tipo_obra_nombre = DB::table('tipos_obras')->where('id', $tipo_obra)->value('nombre');

    // Retornar la vista 'new.paso11' con todos los datos necesarios
    return view('new.paso11', compact(
        'nombre_empresa', 'email_empresa', 'telefono_empresa', 'direccion_obra',
        'tipo_obra', 'tipo_funcionamiento', 'tipo_control', 'motor_potencia',
        'motor_marca', 'motor_voltaje', 'motor_encoder', 'motor_rescate', 'tipo_puerta',
        'puerta_marca', 'puerta_voltaje', 'patin_retractil', 'accesos',
        'tipo_botonera', 'paradas', 'subsuelos', 'estadoBotones', 'vista',
        'placa_cabina', 'indicador_cabina', 'indicador_pb', 'indicador_palier',
        'tipo_funcionamiento_nombre', 'tipo_control_nombre', 'tipo_obra_nombre'
    ));
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

        /* DB::table('pedidos')->insert([
            'id_tipo_obra' => $tipo_obra,
            'id_tipo_funcionamiento' => $tipo_funcionamiento,
            'id_tipo_control' => $tipo_control,
            'id_estado' => $id_estado,
            'nombre' => $nombre_empresa,
            'email' => $email_empresa,
            'telefono' => $telefono_empresa,
            'direccion_obra' => $direccion_obra,
            'created_at' => Now(),
        ]); */

        
        $motor_potencia = $request->input('motor_potencia');
        $motor_marca = $request->input('motor_marca');
        $motor_voltaje = $request->input('motor_voltaje');
        $motor_encoder = $request->input('motor_encoder');
        $motor_rescate = $request->input('motor_rescate');

        /* $id_pedido_old = DB::table('pedidos')
                    ->orderBy('id', 'desc')
                    ->first();

        $id_pedido = $id_pedido_old->id;

         DB::table('motores')->insert([
            'id_pedido' => $id_pedido,
            'id_tipo_control' => $tipo_control,
            'marca' => $motor_marca,
            'potencia' => $motor_potencia,
            'voltaje' => $motor_voltaje,
            'encoder' => $motor_encoder,
            'rescate' => $motor_rescate,
            'created_at' => Now(),
        ]); */

        $tipo_puerta = $request->input('tipo_puerta');

        /* DB::table('tipos_puertas')->insert([
            'id_pedido' => $id_pedido,
            'id_tipo_control' => $tipo_control,
            'nombre' => $tipo_puerta,
            'created_at' => Now(),
        ]); */


        $puerta_marca = $request->input('puerta_marca');
        $puerta_voltaje = $request->input('puerta_voltaje');
        $patin_retractil = $request->input('patin_retractil');

        /* DB::table('detalles_puertas')->insert([
            'id_pedido' => $id_pedido,
            'marca' => $puerta_marca,
            'voltaje' => $puerta_voltaje,
            'patin_retractil' => $patin_retractil,
            'created_at' => Now(),
        ]);      */  

        $accesos = $request->input('accesos');

        /* DB::table('accesos')->insert([
            'id_pedido' => $id_pedido,
            'nombre' => $accesos,
            'created_at' => Now(),
        ]); */

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
        $tipo_obra_nombre = DB::table('tipos_obras')->where('id', $tipo_obra)->value('nombre');

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
            'patin_retractil' => $patin_retractil,
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

            'tipo_funcionamiento_nombre' => $tipo_funcionamiento_nombre,
            'tipo_control_nombre' => $tipo_control_nombre,
            'tipo_obra_nombre' => $tipo_obra_nombre,

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

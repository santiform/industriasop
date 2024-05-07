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
        $cuadro_maniobras = $request->input('tipo_funcionamiento');

        

        return view('new.paso2', [
            'email_empresa' => $email_empresa,
            'nombre_empresa' => $nombre_empresa,
            'direccion_obra' => $direccion_obra,
            'tipo_obra' => $tipo_obra,
            'cuadro_maniobras' => $cuadro_maniobras,
        ]);

    }

   

}

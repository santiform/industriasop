<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PedidoController extends Controller
{
    public function pantalla1()
    {
        return view('pedido.pantalla1');
    }

    public function pantalla2(Request $request)
    {
        // Iniciar la transacción para evitar problemas de concurrencia
        DB::beginTransaction();
        
        try {
            // Insertar los datos del pedido en la tabla 'pedidos'
            $pedido_id = DB::table('pedidos')->insertGetId([
                'nombre' => $request->input('nombre'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Guardar el ID del pedido en la sesión
            session(['pedido_id' => $pedido_id]);

            // Confirmar la transacción
            DB::commit();

            // Redirigir al siguiente paso
            return redirect()->route('pedido.paso2');

        } catch (\Exception $e) {
            // Si ocurre un error, revertir la transacción
            DB::rollBack();
            // Manejo de errores (podrías redirigir o mostrar un mensaje)
            return redirect()->back()->with('error', 'Hubo un problema al crear el pedido.');
        }
        
        if ($edad >= 18) {
            return "Eres mayor de edad.";
        }

        return view('pedido.pantalla1');
    }

}

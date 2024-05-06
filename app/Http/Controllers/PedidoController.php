<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pedidos = DB::table('pedidos')
            ->join('tipos_obras', 'pedidos.id_tipo_obra', '=', 'tipos_obras.id')
            ->join('tipos_funcionamientos', 'pedidos.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
            ->join('tipos_controles', 'pedidos.id_tipo_control', '=', 'tipos_controles.id')
            ->join('tipos_puertas', 'pedidos.id_tipo_puerta', '=', 'tipos_puertas.id')
            ->join('estados_pedidos', 'pedidos.id_estado', '=', 'estados_pedidos.id')
            ->select('pedidos.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento', 'tipos_obras.nombre AS tipo_obra',
                'tipos_controles.nombre AS tipo_control', 'tipos_puertas.nombre AS tipo_puerta',
                'estados_pedidos.nombre AS estado')
            ->get();

        return view('pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {   
        /* $pedidos = DB::table('pedidos')
            ->join('tipos_obras', 'pedidos.id_tipo_obra', '=', 'tipos_obras.id')
            ->join('tipos_funcionamientos', 'pedidos.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
            ->join('tipos_controles', 'pedidos.id_tipo_control', '=', 'tipos_controles.id')
            ->join('tipos_puertas', 'pedidos.id_tipo_puerta', '=', 'tipos_puertas.id')
            ->join('accesos', 'pedidos.id_acceso', '=', 'accesos.id')
            ->join('estados_pedidos', 'pedidos.id_estado', '=', 'estados_pedidos.id')
            ->select('pedidos.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento',
                'tipos_controles.nombre AS tipo_control', 'tipos_puertas.nombre AS tipo_puerta'
                'accesos.nombre AS tipo_puerta')
            ->get(); // dejo esto como referencia */



        $pedido = new Pedido();

        $tiposObras = DB::table('tipos_obras')->get();
        $tiposFuncionamientos = DB::table('tipos_funcionamientos')->get();
        $tiposControles = DB::table('tipos_controles')->get();
        $tiposPuertas = DB::table('tipos_puertas')->get();  
        $accesos = DB::table('accesos')->get();
        $estados = DB::table('estados_pedidos')->get();    

        return view('pedido.create', compact('pedido', 'tiposObras', 'tiposFuncionamientos', 'tiposControles',
                    'tiposPuertas', 'accesos', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PedidoRequest $request): RedirectResponse
    {
        Pedido::create($request->validated());

        return Redirect::route('pedidos.index')
            ->with('success', 'Pedido created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pedidos = DB::table('pedidos')
            ->where('pedidos.id', $id)
            ->join('tipos_obras', 'pedidos.id_tipo_obra', '=', 'tipos_obras.id')
            ->join('tipos_funcionamientos', 'pedidos.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
            ->join('tipos_controles', 'pedidos.id_tipo_control', '=', 'tipos_controles.id')
            ->join('tipos_puertas', 'pedidos.id_tipo_puerta', '=', 'tipos_puertas.id')
            ->join('estados_pedidos', 'pedidos.id_estado', '=', 'estados_pedidos.id')
            ->select('pedidos.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento', 'tipos_obras.nombre AS tipo_obra',
                'tipos_controles.nombre AS tipo_control', 'tipos_puertas.nombre AS tipo_puerta',
                'estados_pedidos.nombre AS estado')
            ->first();

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {   
        /* $pedidos = DB::table('pedidos')
            ->join('tipos_obras', 'pedidos.id_tipo_obra', '=', 'tipos_obras.id')
            ->join('tipos_funcionamientos', 'pedidos.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
            ->join('tipos_controles', 'pedidos.id_tipo_control', '=', 'tipos_controles.id')
            ->join('tipos_puertas', 'pedidos.id_tipo_puerta', '=', 'tipos_puertas.id')
            ->join('accesos', 'pedidos.id_acceso', '=', 'accesos.id')
            ->join('estados_pedidos', 'pedidos.id_estado', '=', 'estados_pedidos.id')
            ->select('pedidos.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento',
                'tipos_controles.nombre AS tipo_control', 'tipos_puertas.nombre AS tipo_puerta'
                'accesos.nombre AS tipo_puerta')
            ->get(); // dejo esto como referencia */

        $pedido = Pedido::find($id);

        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PedidoRequest $request, Pedido $pedido): RedirectResponse
    {
        $pedido->update($request->validated());

        return Redirect::route('pedidos.index')
            ->with('success', 'Pedido updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Pedido::find($id)->delete();

        return Redirect::route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }
}

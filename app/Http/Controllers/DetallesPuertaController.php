<?php

namespace App\Http\Controllers;

use App\Models\DetallesPuerta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetallesPuertaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

class DetallesPuertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detallesPuertas = DB::table('detalles_puertas')
           ->join('tipos_funcionamientos', 'detalles_puertas.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
            ->join('tipos_controles', 'detalles_puertas.id_tipo_control', '=', 'tipos_controles.id')
            ->join('tipos_puertas', 'detalles_puertas.id_tipo_puerta', '=', 'tipos_puertas.id')
            ->join('tipos_patin_retractiles', 'detalles_puertas.id_patin_retractil', '=', 'tipos_patin_retractiles.id')
            ->select('detalles_puertas.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento',
                'tipos_controles.nombre AS tipo_control', 'tipos_puertas.nombre AS tipo_puerta',
                'tipos_patin_retractiles.tipo AS patin_retractil')
            ->get();

        

        return view('detalles-puerta.index', compact('detallesPuertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detallesPuerta = new DetallesPuerta();

        $tiposFuncionamientos = DB::table('tipos_funcionamientos')->get();
        $tiposControles = DB::table('tipos_controles')->get();
        $tiposPuertas = DB::table('tipos_puertas')->get();        

        return view('detalles-puerta.create', compact('detallesPuerta', 'tiposPuertas', 'tiposFuncionamientos', 'tiposControles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetallesPuertaRequest $request): RedirectResponse
    {
        DetallesPuerta::create($request->validated());

        return Redirect::route('detalles-puertas.index')
            ->with('success', 'DetallesPuerta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detallesPuerta = DB::table('detalles_puertas')
            ->join('tipos_funcionamientos', 'detalles_puertas.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
            ->join('tipos_controles', 'detalles_puertas.id_tipo_control', '=', 'tipos_controles.id')
            ->join('tipos_puertas', 'detalles_puertas.id_tipo_puerta', '=', 'tipos_puertas.id')
            ->join('tipos_patin_retractiles', 'detalles_puertas.id_patin_retractil', '=', 'tipos_patin_retractiles.id')
            ->where('detalles_puertas.id', $id)
            ->select('detalles_puertas.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento',
                'tipos_controles.nombre AS tipo_control', 'tipos_puertas.nombre AS tipo_puerta',
                'tipos_patin_retractiles.tipo AS patin_retractil')
            ->first();

        return view('detalles-puerta.show', compact('detallesPuerta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detallesPuerta = DetallesPuerta::find($id);

        return view('detalles-puerta.edit', compact('detallesPuerta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetallesPuertaRequest $request, DetallesPuerta $detallesPuerta): RedirectResponse
    {
        $detallesPuerta->update($request->validated());

        return Redirect::route('detalles-puertas.index')
            ->with('success', 'DetallesPuerta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetallesPuerta::find($id)->delete();

        return Redirect::route('detalles-puertas.index')
            ->with('success', 'DetallesPuerta deleted successfully');
    }
}

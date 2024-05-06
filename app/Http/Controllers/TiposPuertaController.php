<?php

namespace App\Http\Controllers;

use App\Models\TiposPuerta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposPuertaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

class TiposPuertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposPuertas = DB::table('tipos_puertas')
            ->join('tipos_funcionamientos', 'tipos_puertas.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
            ->join('tipos_controles', 'tipos_puertas.id_tipo_control', '=', 'tipos_controles.id')
            ->select('tipos_puertas.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento', 'tipos_controles.nombre AS tipo_control')
            ->get();

        return view('tipos-puerta.index', compact('tiposPuertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposPuerta = new TiposPuerta();

        $tiposFuncionamientos = DB::table('tipos_funcionamientos')->get();
        $tiposControles = DB::table('tipos_controles')->get();

        return view('tipos-puerta.create', compact('tiposPuerta', 'tiposFuncionamientos', 'tiposControles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposPuertaRequest $request): RedirectResponse
    {
        TiposPuerta::create($request->validated());

        return Redirect::route('tipos-puertas.index')
            ->with('success', 'TiposPuerta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposPuerta = DB::table('tipos_puertas')
                    ->join('tipos_funcionamientos', 'tipos_puertas.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
                    ->join('tipos_controles', 'tipos_puertas.id_tipo_funcionamiento', '=', 'tipos_controles.id')
                    ->where('tipos_puertas.id', $id)
                    ->select('tipos_puertas.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento', 'tipos_controles.nombre AS tipo_control')
                    ->first();

        return view('tipos-puerta.show', compact('tiposPuerta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposPuerta = DB::table('tipos_puertas')
                    ->where('tipos_puertas.id', $id)
                    ->first();

        $tiposFuncionamientos = DB::table('tipos_funcionamientos')->get();
        $tiposControles = DB::table('tipos_controles')->get();

        return view('tipos-puerta.edit', compact('tiposPuerta', 'tiposFuncionamientos', 'tiposControles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposPuertaRequest $request, TiposPuerta $tiposPuerta): RedirectResponse
    {
        $tiposPuerta->update($request->validated());

        return Redirect::route('tipos-puertas.index')
            ->with('success', 'TiposPuerta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TiposPuerta::find($id)->delete();

        return Redirect::route('tipos-puertas.index')
            ->with('success', 'TiposPuerta deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TiposControle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposControleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

class TiposControleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposControles = DB::table('tipos_controles')
                    ->join('tipos_funcionamientos', 'tipos_controles.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
                    ->select('tipos_controles.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento')
                    ->get();

        return view('tipos-controle.index', compact('tiposControles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposControle = new TiposControle();

        $tiposFuncionamiento = DB::table('tipos_funcionamientos')->get();

        return view('tipos-controle.create', compact('tiposControle', 'tiposFuncionamiento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposControleRequest $request): RedirectResponse
    {
        TiposControle::create($request->validated());

        return Redirect::route('tipos-controles.index')
            ->with('success', 'TiposControle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposControle = DB::table('tipos_controles')
                    ->where('tipos_controles.id', $id)
                    ->join('tipos_funcionamientos', 'tipos_controles.id_tipo_funcionamiento', '=', 'tipos_funcionamientos.id')
                    ->select('tipos_controles.*', 'tipos_funcionamientos.nombre AS tipo_funcionamiento')
                    ->first();

        return view('tipos-controle.show', compact('tiposControle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposControle = TiposControle::find($id);

        $tiposFuncionamiento = DB::table('tipos_funcionamientos')->get();

        return view('tipos-controle.edit', compact('tiposControle', 'tiposFuncionamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposControleRequest $request, TiposControle $tiposControle): RedirectResponse
    {
        $tiposControle->update($request->validated());

        return Redirect::route('tipos-controles.index')
            ->with('success', 'TiposControle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TiposControle::find($id)->delete();

        return Redirect::route('tipos-controles.index')
            ->with('success', 'TiposControle deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TiposFuncionamiento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposFuncionamientoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TiposFuncionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposFuncionamientos = TiposFuncionamiento::paginate();

        return view('tipos-funcionamiento.index', compact('tiposFuncionamientos'))
            ->with('i', ($request->input('page', 1) - 1) * $tiposFuncionamientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposFuncionamiento = new TiposFuncionamiento();

        return view('tipos-funcionamiento.create', compact('tiposFuncionamiento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposFuncionamientoRequest $request): RedirectResponse
    {
        TiposFuncionamiento::create($request->validated());

        return Redirect::route('tipos-funcionamientos.index')
            ->with('success', 'TiposFuncionamiento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposFuncionamiento = TiposFuncionamiento::find($id);

        return view('tipos-funcionamiento.show', compact('tiposFuncionamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposFuncionamiento = TiposFuncionamiento::find($id);

        return view('tipos-funcionamiento.edit', compact('tiposFuncionamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposFuncionamientoRequest $request, TiposFuncionamiento $tiposFuncionamiento): RedirectResponse
    {
        $tiposFuncionamiento->update($request->validated());

        return Redirect::route('tipos-funcionamientos.index')
            ->with('success', 'TiposFuncionamiento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TiposFuncionamiento::find($id)->delete();

        return Redirect::route('tipos-funcionamientos.index')
            ->with('success', 'TiposFuncionamiento deleted successfully');
    }
}

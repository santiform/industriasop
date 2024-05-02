<?php

namespace App\Http\Controllers;

use App\Models\DetallesPuerta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetallesPuertaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetallesPuertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detallesPuertas = DetallesPuerta::paginate();

        return view('detalles-puerta.index', compact('detallesPuertas'))
            ->with('i', ($request->input('page', 1) - 1) * $detallesPuertas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detallesPuerta = new DetallesPuerta();

        return view('detalles-puerta.create', compact('detallesPuerta'));
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
        $detallesPuerta = DetallesPuerta::find($id);

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

<?php

namespace App\Http\Controllers;

use App\Models\HabilitacionesAcceso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\HabilitacionesAccesoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HabilitacionesAccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $habilitacionesAccesos = HabilitacionesAcceso::paginate();

        return view('habilitaciones-acceso.index', compact('habilitacionesAccesos'))
            ->with('i', ($request->input('page', 1) - 1) * $habilitacionesAccesos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $habilitacionesAcceso = new HabilitacionesAcceso();

        return view('habilitaciones-acceso.create', compact('habilitacionesAcceso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabilitacionesAccesoRequest $request): RedirectResponse
    {
        HabilitacionesAcceso::create($request->validated());

        return Redirect::route('habilitaciones-accesos.index')
            ->with('success', 'HabilitacionesAcceso created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $habilitacionesAcceso = HabilitacionesAcceso::find($id);

        return view('habilitaciones-acceso.show', compact('habilitacionesAcceso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $habilitacionesAcceso = HabilitacionesAcceso::find($id);

        return view('habilitaciones-acceso.edit', compact('habilitacionesAcceso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabilitacionesAccesoRequest $request, HabilitacionesAcceso $habilitacionesAcceso): RedirectResponse
    {
        $habilitacionesAcceso->update($request->validated());

        return Redirect::route('habilitaciones-accesos.index')
            ->with('success', 'HabilitacionesAcceso updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        HabilitacionesAcceso::find($id)->delete();

        return Redirect::route('habilitaciones-accesos.index')
            ->with('success', 'HabilitacionesAcceso deleted successfully');
    }
}

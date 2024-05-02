<?php

namespace App\Http\Controllers;

use App\Models\DetallesGenerale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetallesGeneraleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetallesGeneraleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detallesGenerales = DetallesGenerale::paginate();

        return view('detalles-generale.index', compact('detallesGenerales'))
            ->with('i', ($request->input('page', 1) - 1) * $detallesGenerales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detallesGenerale = new DetallesGenerale();

        return view('detalles-generale.create', compact('detallesGenerale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetallesGeneraleRequest $request): RedirectResponse
    {
        DetallesGenerale::create($request->validated());

        return Redirect::route('detalles-generales.index')
            ->with('success', 'DetallesGenerale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detallesGenerale = DetallesGenerale::find($id);

        return view('detalles-generale.show', compact('detallesGenerale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detallesGenerale = DetallesGenerale::find($id);

        return view('detalles-generale.edit', compact('detallesGenerale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetallesGeneraleRequest $request, DetallesGenerale $detallesGenerale): RedirectResponse
    {
        $detallesGenerale->update($request->validated());

        return Redirect::route('detalles-generales.index')
            ->with('success', 'DetallesGenerale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DetallesGenerale::find($id)->delete();

        return Redirect::route('detalles-generales.index')
            ->with('success', 'DetallesGenerale deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TiposObra;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposObraRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TiposObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposObras = TiposObra::paginate();

        return view('tipos-obra.index', compact('tiposObras'))
            ->with('i', ($request->input('page', 1) - 1) * $tiposObras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposObra = new TiposObra();

        return view('tipos-obra.create', compact('tiposObra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposObraRequest $request): RedirectResponse
    {
        TiposObra::create($request->validated());

        return Redirect::route('tipos-obras.index')
            ->with('success', 'TiposObra created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposObra = TiposObra::find($id);

        return view('tipos-obra.show', compact('tiposObra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposObra = TiposObra::find($id);

        return view('tipos-obra.edit', compact('tiposObra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposObraRequest $request, TiposObra $tiposObra): RedirectResponse
    {
        $tiposObra->update($request->validated());

        return Redirect::route('tipos-obras.index')
            ->with('success', 'TiposObra updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TiposObra::find($id)->delete();

        return Redirect::route('tipos-obras.index')
            ->with('success', 'TiposObra deleted successfully');
    }
}

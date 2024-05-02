<?php

namespace App\Http\Controllers;

use App\Models\TiposPatinRetractile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposPatinRetractileRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TiposPatinRetractileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposPatinRetractiles = TiposPatinRetractile::paginate();

        return view('tipos-patin-retractile.index', compact('tiposPatinRetractiles'))
            ->with('i', ($request->input('page', 1) - 1) * $tiposPatinRetractiles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposPatinRetractile = new TiposPatinRetractile();

        return view('tipos-patin-retractile.create', compact('tiposPatinRetractile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposPatinRetractileRequest $request): RedirectResponse
    {
        TiposPatinRetractile::create($request->validated());

        return Redirect::route('tipos-patin-retractiles.index')
            ->with('success', 'TiposPatinRetractile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposPatinRetractile = TiposPatinRetractile::find($id);

        return view('tipos-patin-retractile.show', compact('tiposPatinRetractile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposPatinRetractile = TiposPatinRetractile::find($id);

        return view('tipos-patin-retractile.edit', compact('tiposPatinRetractile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposPatinRetractileRequest $request, TiposPatinRetractile $tiposPatinRetractile): RedirectResponse
    {
        $tiposPatinRetractile->update($request->validated());

        return Redirect::route('tipos-patin-retractiles.index')
            ->with('success', 'TiposPatinRetractile updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TiposPatinRetractile::find($id)->delete();

        return Redirect::route('tipos-patin-retractiles.index')
            ->with('success', 'TiposPatinRetractile deleted successfully');
    }
}

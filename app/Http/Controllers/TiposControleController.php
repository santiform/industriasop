<?php

namespace App\Http\Controllers;

use App\Models\TiposControle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposControleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TiposControleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposControles = TiposControle::paginate();

        return view('tipos-controle.index', compact('tiposControles'))
            ->with('i', ($request->input('page', 1) - 1) * $tiposControles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposControle = new TiposControle();

        return view('tipos-controle.create', compact('tiposControle'));
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
        $tiposControle = TiposControle::find($id);

        return view('tipos-controle.show', compact('tiposControle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposControle = TiposControle::find($id);

        return view('tipos-controle.edit', compact('tiposControle'));
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

<?php

namespace App\Http\Controllers\Universe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universe;

class UniverseController extends Controller
{
    public function index()
    {
        $universes = Universe::paginate(20);

        return view('universe.index', compact('universes'));
    }

    public function create()
    {
        return view('universe.create');
    }

    public function store(Request $request)
    {
        Universe::create($request->all());

        return redirect()->route('universes.index') ->with('success' , 'Usuário Criado Com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

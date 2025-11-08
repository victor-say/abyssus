<?php

namespace App\Http\Controllers\Universe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universe;
use App\Http\Requests\StoreUniverseRequest;


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

    public function store(StoreUniverseRequest $request)
    {
        Universe::create($request->all());

        return redirect()->route('universes.index') ->with('success' , 'Universo Criado Com Sucesso');
    }


    public function show(string $id)
    {
        if (!$universe = Universe::find($id)) {
                return redirect()->route('universes.index')->with('message', 'Universo não foi encontrado');
            }

        return view('universe.show', compact ('universe'));
    }


    public function edit(string $id)
    {
        if(!$universe = Universe::find($id)){
            return redirect()->route('universes.index')->with('message', 'Universo não foi encontrado');
        }

        return view('universe.edit', compact('universe'));
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

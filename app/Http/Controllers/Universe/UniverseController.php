<?php

namespace App\Http\Controllers\Universe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Universe;
use App\Http\Requests\{StoreUniverseRequest, UpdateUniverseRequest};


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


    public function update(UpdateUniverseRequest $request, string $id)
    {
        if(!$universe = Universe::find($id)){
            return redirect()->route('universes.index')->with('message', 'Universe não foi encontrado');
        }

        $universe->update($request->only([
            'name', 
            'author', 
            'personagens',
            'books',
            'conceitos',
        ]));

        return redirect()->route('universes.index')->with('message', 'Universo foi editado com sucesso');
    }


    public function destroy(string $id)
    {
        if (!$universe = Universe::find($id)) {
            return redirect()->route('universes.index')->with('message', 'Universo não foi encontrado');
        }

        $universe->delete();

        return redirect()->route('universes.index')->with('message', 'Universo deletado com sucesso');
    }
}

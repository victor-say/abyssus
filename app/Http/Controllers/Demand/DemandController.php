<?php

namespace App\Http\Controllers\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDemandRequest;

use App\Models\Demand;


class DemandController extends Controller
{

    public function index()
    {
        $demands = Demand::paginate(20);

        return view('demand.index', compact('demands'));
    }

    public function create()
    {
        return view('demand.create');
    }

    public function store(StoreDemandRequest $request)
    {
        $data = $request;

        Demand::create([
            'book_asks_' => $data['book_asks_'],
            'date_asks' => $data['date_asks'],
            'name_asks_' => auth()->id(),     
        ]);     

        return redirect()->route('demands.index') -> with('success', ' Demanda cadastrada com sucesso');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        if(!$demand = Demand::find($id)){
            return redirect()->route('demands.index')->with('message', 'Demanda não foi encontrada');
        }

        return view('demand.edit', compact('demand'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

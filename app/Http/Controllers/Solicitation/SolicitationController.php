<?php

namespace App\Http\Controllers\Solicitation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitationRequest;

use App\Models\Solicitation;


class SolicitationController extends Controller
{

    public function index()
    {
        $solicitations = Solicitation::paginate(20);

        return view('solicitation.index', compact('solicitations'));
    }


    public function create()
    {
        return view('solicitation.create');
    }


    public function store(StoreSolicitationRequest $request)
    {
        $data = $request;//->validate();

        Solicitation::create([
            'id_user'=> auth()->id(),
            'ask_'=> $data['ask_'],
            'type_'=> $data['type_'],
        ]);

        return redirect()->route('solicitations.index') ->with('success' , 'Solicitação Criada Com Sucesso');
    }



    public function show(string $id)
    {

        $solicitation = Solicitation::with('user')->findOrFail($id);

        return view('solicitation.show', compact ('solicitation'));
    }


    public function edit(string $id)
    {
        //
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

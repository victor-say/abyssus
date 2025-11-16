<?php

namespace App\Http\Controllers\Solicitation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreSolicitationRequest, UpdateSolicitationRequest};
use Carbon\Carbon;
use App\Models\Solicitation;


class SolicitationController extends Controller
{

    public function index()
    {
        $solicitations = Solicitation::where('id_user', auth()->id())->paginate(20);

        return view('solicitation.index', compact('solicitations'));
    }


    public function create()
    {
        return view('solicitation.create');
    }


    public function store(StoreSolicitationRequest $request)
    {
        
        
        Solicitation::create($request->only([
            'id_user'   => auth()->id(),
            'ask_'      => $request->ask_,
            'type_'     => $request->type_,
            'data_hora' => Carbon::now(), 
        ]));
        
        // $data = $request;

        // $data_hora = Carbon::createFromFormat('Y-m-d\TH:i', $request->data_hora);


        // Solicitation::create([
        //     'id_user'=> auth()->id(),
        //     'ask_'=> $data['ask_'],
        //     'type_'=> $data['type_'],
        //     'data_hora' => Carbon::now(),
        // ]);

        return redirect()->route('solicitations.index') ->with('success' , 'Solicitação Criada Com Sucesso');
    }



    public function show(string $id)
    {

        $solicitation = Solicitation::with('user')->findOrFail($id);

        return view('solicitation.show', compact ('solicitation'));
    }


    public function edit(string $id)
    {
        if(!$solicitation = Solicitation::find($id)){
            return redirect()->route('solicitations.index')->with('message', 'Solicitação não foi encontrada');
        }

        return view('solicitation.edit', compact('solicitation'));

    }

    public function update(Request $request, string $id)
    {
        if(!$solicitation = Solicitation::find($id)){
            return redirect()->route('solicitations.index')->with('message', 'Solicitação não foi encontrada');
        }


        // $data = $request;

        
        $solicitation->update([
            'ask_'      => $request->ask_,
            'type_'     => $request->type_,
            'data_hora_up' => Carbon::now(), 
        ]);



        return redirect()->route('solicitations.index')->with('message', 'Socilitação foi editada com sucesso');

    }


    public function destroy(string $id)
    {
        if (!$solicitation = Solicitation::find($id)) {
            return redirect()->route('solicitations.index')->with('message', 'Solicitação não foi encontrada');
        }

        $solicitation->delete();

        return redirect()->route('solicitations.index')->with('message', 'Solicitação deletada com sucesso');

    }
}

<?php

namespace App\Http\Controllers\Solicitation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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


    public function store(Request $request)
    {
        //
    }



    public function show(string $id)
    {
        //
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

<?php

namespace App\Http\Controllers\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        //
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

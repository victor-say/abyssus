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
        return view('demand.create');
    }

    // public function store(Request $request)
    // {
    //     $infor = $request;

    //     Demand::create([
    //         'name_asks_'  => auth()->id(),
    //         'book_asks_'=>$infor['book_asks_'],
    //         'date_asks' =>$infor['date_asks'],        
    //     ]);     

    //     return redirect()->route('books.index') -> with('success', ' Livro cadastrado com sucesso');
    // }
/////////////////////////////////////////////////////////////////////////////////////////////////////q





    public function store(Request $request)
    {
        $data = $request->validate([
            'book_asks_' => 'required|string|max:255',
            'date_asks'  => 'required',
        ]);

        // 1) Usando auth()->id()
        $post = Demand::create([
            'book_asks_'   => $data['book_asks_'],
            'date_asks'    => $data['date_asks'],
            'name_asks_' => auth()->id(),
        ]);

        // OU 2) Usando $request->user()->relationship()->create()
        // $post = $request->user()->posts()->create($data);

        return redirect()->back()->with('success', 'Post criado');
    }











//////////////////////////////////////////////////////////////////////////////////////////////////////q
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

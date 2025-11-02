<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::paginate(20);

        return view('author.index', compact('authors'));
    }


    public function create()
    {
        return view('author.create');
    }


    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->all());
        
        return redirect()->route('authors.index') -> with('success', '  Autor cadastrado com sucesso');
    }


    public function show(string $id)
    {
        if (!$author = Author::find($id)) {
            return redirect()->route('authors.index')->with('message', 'Autor não foi encontrado');
        }

        return view('author.show', compact ('author'));
    }


    public function edit(string $id)
    {
        if(!$author= Author::find($id)){
            return redirect()->route('authors.index')->with('message', 'Autor não foi encontrado');
        }

        return view('author.edit', compact('author'));
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

<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreAuthorRequest, UpdateAuthorRequest};
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


    public function update(UpdateAuthorRequest $request, string $id)
    {
        if(!$author = Author::find($id)){
            return redirect()->route('authors.index')->with('message', 'Autor não foi encontrado');
        }

        $author->update($request->only([
            'name', 
            'genero', 
            'main_Works', 
            'public_'

        ]));

        return redirect()->route('authors.index')->with('message', 'Author foi editado com sucesso');
        
    }


    public function destroy(string $id)
    {
        if (!$author = Author::find($id)) {
            return redirect()->route('authors.index')->with('message', 'Autor não foi encontrado');
        }

        $author->delete();

        return redirect()->route('authors.index')->with('message', 'Autor deletado com sucesso');
    }
}

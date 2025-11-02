<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreBookRequest, UpdateBookRequest};
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::paginate(20);

        return view('book.index', compact('books'));
    }

     
    public function create()
    {
        return view('book.create');
    }


    public function store(StoreBookRequest $request)
    {
        Book::create($request->all());   

        return redirect()->route('books.index') -> with('success', ' Livro cadastrado com sucesso');
    }

    public function show(string $id)
    {
        if(!$book = Book::find($id)){
            return redirect()->route('book.index')->with('message', 'Livro não foi encontrado');
        }

        return view('book.show', compact('book'));
    }


    public function edit(string $id)
    {
        if(!$book = Book::find($id)){
            return redirect()->route('book.index')->with('message', 'Livro não foi encontrado');
        }

        return view('book.edit', compact('book'));
    }


    
    public function update(UpdateBookRequest $request, string $id)
    {
        if(!$book = Book::find($id)){
            return redirect()->route('book.index')->with('message', 'Livro não foi encontrado');
        }

        $book->update($request->only([
            'name', 
            'author', 
            'pages', 
            'publisher', 
            'universe', 
            'synopsis', 
            'genero', 
            'public',
        ]));

        return redirect()->route('books.index')->with('message', 'Livro editado com sucesso');
        
    }

    public function destroy(string $id)
    {
        if (!$book = Book::find($id)) {
            return redirect()->route('books.index')->with('message', 'Livro não foi encontrado');
        }

        $book->delete();

        return redirect()->route('books.index')->with('message', 'livro deletado com sucesso');
    
    }
}

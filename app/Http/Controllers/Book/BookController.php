<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
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
            return redirect()->route('book.index')->with('message', 'Livro não encontrado');
        }

        return view('book.show', compact('book'));
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

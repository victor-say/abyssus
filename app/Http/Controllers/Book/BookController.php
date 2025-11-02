<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
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

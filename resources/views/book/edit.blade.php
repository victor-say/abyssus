@extends('book.layouts.app') 

@section('title', 'Editar um Livro') 

@section('content') 

    <h1>Editar Livro {{$book->name}}</h1>

    <a href="{{ route('books.index') }}">Voltar(<)</a>
        
    <form action="{{ route('books.update', $book->id)}}" method="post"> 
        @csrf() 
        @method('put') 

        @if ($errors->any)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
            
        <label>Nome</label> 
        <input type="text" name='name' placeholder="Seu nome" value='{{ $book->name}} ' > 
        
        <label>Autor</label> 
        <input type="text" name='author' placeholder="autor" value='{{ $book->author}}' > 
        
        <label>Numeros de Páginas</label> 
        <input type="number" name='pages' placeholder="Numero de páginas" value='{{ $book->pages}}'> 
        
        <label>Editora</label> 
        <input type="text" name='publisher' placeholder="Editora que o publica" value='{{ $book->publisher}}' > 
        
        <label>Universo</label> 
        <input type="text" name='universe' placeholder="Universo de Origem" value='{{ $book->universe }}' > 
        
        <label>Sinopse</label> 
        <input type="text" name='synopsis' placeholder="Sinopse do livro"  value='{{ $book->synopsis}}'> 
        
        <label>Gênero</label> 
        <input type="text" name='genero' placeholder="Gênero do livro" value='{{ $book->genero}}'> 
        
        <label>Publico alvo</label> 
        <input type="text" name='public' placeholder="Publico Alvo" value='{{ $book->public}}'> 
        
        <button type="submit">Enviar</button> 
    </form> 

@endsection
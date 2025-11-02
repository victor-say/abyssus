@extends('book.layouts.app')

@section('title', 'Cadastrar Novo Livro')

@section('content')

    <h1>Cadastrar Novo Livro</h1>

    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store')}}" method="post">
        @csrf()

        <label>Nome</label>
        <input type="text" name='name' placeholder="Seu nome">

        <label>Autor</label>
        <input type="text" name='author' placeholder="autor">

        <label>Numeros de Páginas</label>
        <input type="number" name='pages' placeholder="Numero de páginas">

        <label>Editora</label>
        <input type="text" name='publisher' placeholder="Editora que o publica">
        
        <label>Universo</label>
        <input type="text" name='universe' placeholder="Universo de Origem">

        <label>Sinopse</label>
        <input type="text" name='synopsis' placeholder="Sinopse do livro">

        <label>Gênero</label>
        <input type="text" name='genero' placeholder="Gênero do livro">

        <label>Publico alvo</label>
        <input type="text" name='public' placeholder="Publico Alvo">
        
        <button type="submit">Enviar</button>

    </form>

@endsection

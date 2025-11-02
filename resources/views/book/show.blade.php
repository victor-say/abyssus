@extends('book.layouts.app')


@section('title', 'detalhes do Livro')

@section('content')

    <h2>Detalhes do Livro {{ $book->name}}</h2>

    <ul>
        <li>ID: {{ $book->id}}</li>
        <li>Nome: {{ $book->name}}</li>
        <li>Autor: {{ $book->author}}</li>
        <li>Numero de Páginas: {{ $book->pages}}</li>
        <li>Editora:  {{ $book->publisher}}</li>
        <li>Universo:  {{ $book->universe}}</li>
        <li>Sinopse:  {{ $book->synopsis}}</li>
        <li>Gênero:  {{ $book->genero}}</li>
        <li>Publico:  {{ $book->public}}</li>
    </ul>
    @can('is-admin')
        <form action="{{ route('users.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endcan

@endsection
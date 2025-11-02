@extends('book.layouts.app')

@section('title', 'Listagem de Livros')

@section('content')

    <h1>Livros</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Páginas</th>
                <th>Editora</th>
                <th>Universo</th>
                <th>Sinopse</th>
                <th>Gênero</th>
                <th>Publico Alvo</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbory>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->name}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->pages}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->universe}}</td>
                    <td>{{$book->synopsis}}</td>
                    <td>{{$book->genero}}</td>
                    <td>{{$book->public}}</td>
                    <td>
                        <a href="">Ler</a>
                    </td>
                    <td>
                        <a href="">Editar</a>
                    </td>
                    <td>
                        <a href="">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum livro encontado no banco</td>
                </tr>
            @endforelse
        </tbory>
    </table>

    {{$books->links()}}
@endsection
    
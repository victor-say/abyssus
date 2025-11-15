@extends('book.layouts.app')


@section('title', 'detalhes do Livro')

@section('content')

    <h2>Detalhes do Livro {{ $book->name}}</h2>
    

    <p>Voltar<a href='{{route('books.index')}}'>(<)</a></p>


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
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar o livro {{$book->name}}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endcan


    @can('is-admin')

        <form id="deleteForm{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $book->id }})">Excluir</button>
        </form>

        <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Tem certeza que deseja deletar o livro {{$book->name}}?',
                text: "Esta ação não pode ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }
        </script>

    @endcan

@endsection
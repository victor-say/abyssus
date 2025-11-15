@extends('admin.layouts.app')


@section('title', 'detalhes do Autor')

@section('content')



    <h2>Detalhes do Autor {{ $author->name}}</h2>
    

    <p>Voltar<a href='{{route('authors.index')}}'>(<)</a></p>

    <ul>
        <li>ID: {{ $author->id}}</li>
        <li>Nome: {{ $author->name}}</li>
        <li>Gênero: {{ $author->genero}}</li>
        <li>Principais Obras: {{ $author->main_Works}}</li>
        <li>Publico Alvo: {{ $author->public_}}</li>
    </ul>
    @can('is-admin')
        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar o Autor {{$author->name}}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endcan



    @can('is-admin')


        <form id="deleteForm{{ $author->id }}" action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $author->id }})">Excluir</button>
        </form>

        <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Tem certeza que deseja deletar o autor {{$author->name}}?',
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
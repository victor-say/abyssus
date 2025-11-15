@extends('universe.layouts.app')


@section('title', 'detalhes do Universo')

@section('content')



    <h2>Detalhes do Universo {{ $universe->name}}</h2>
    

    <p>Voltar<a href='{{route('universes.index')}}'>(<)</a></p>

    <ul>
        <li>ID: {{ $universe->id}}</li>
        <li>Nome: {{ $universe->name}}</li>
        <li>Autor: {{ $universe->author}}</li>
        <li>Personagens: {{ $universe->personagens}}</li>
        <li>Livros Que O Apresenta: {{ $universe->books}}</li>
        <li>Conceitos que ele Apresenta: {{ $universe->conceitos}}</li>
    </ul>


    @can('is-admin')


        <form id="deleteForm{{ $universe->id }}" action="{{ route('universes.destroy', $universe->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $universe->id }})">Excluir</button>
        </form>

        <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Tem certeza que deseja deletar o universo {{$universe->name}}?',
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
@extends('admin.layouts.app')


@section('title', 'detalhes do Usuário')

@section('content')



    <h2>Detalhes do Usuário {{ $user->name}}</h2>
    
    
    <ul>
        <li>ID: {{ $user->id}}</li>
        <li>Nome: {{ $user->name}}</li>
        <li>E-mail: {{ $user->email}}</li>
        <li>class: {{ $user->class}}</li>
    </ul>
    @can('is-admin')


        <form id="deleteForm{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $user->id }})">Excluir</button>
        </form>

        <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Tem certeza que deseja deletar o usuário {{$user->name}}?',
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
@extends('solicitation.layouts.app')


@section('title', 'detalhes de uma Solicitação')

@section('content')

    <h2>Detalhes da Solicitação {{ $solicitation->type_}}</h2>
    

    <p>Voltar<a href='{{route('solicitations.index')}}'>(<)</a></p>


    <ul>
        <li>Tipo Da Solicitação: {{ $solicitation->type_}}</li>
        <li>Texto Da Solicitação: {{ $solicitation->ask_}}</li>
        <li>Quando Foi Criado: {{ \Carbon\Carbon::parse($solicitation->data_hora)->format('d/m/Y H:i') }}</li>
        <li>Ultima Vez Que foi Editado: {{ \Carbon\Carbon::parse($solicitation->data_hora_up)->format('d/m/Y H:i') }}</li>

    @can('is-admin')
        <li>Quem Criou A Solicitação: {{ $solicitation->id_user ?? 'Usuário Foi removido'}}</li>
        <li>Id Da Solicitação: {{ $solicitation->id}}</li>
    @endcan
    
    </ul>


    @can('is-admin')


        <form id="deleteForm{{ $solicitation->id }}" action="{{ route('solicitations.destroy', $solicitation->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $solicitation->id }})">Excluir</button>
        </form>

        <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Tem certeza que deseja deletar a solicitation {{$solicitation->name}}?',
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
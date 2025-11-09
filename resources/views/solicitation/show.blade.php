@extends('solicitation.layouts.app')


@section('title', 'detalhes de uma Solicitação')

@section('content')

    <h2>Detalhes da Solicitação {{ $solicitation->type_}}</h2>
    

    <p>Voltar<a href='{{route('solicitations.index')}}'>(<)</a></p>


    <ul>
        <li>Tipo Da Solicitação: {{ $solicitation->type_}}</li>
        <li>Texto Da Solicitação: {{ $solicitation->ask_}}</li>
        <li>Quando Foi Criado: {{ $solicitation->created_at}}</li>
        <li>Ultima Vez Que foi Editado: {{ $solicitation->updated_at}}</li>

    @can('is-admin')
        <li>Quem Criou A Solicitação: {{ $solicitation->id_user ?? 'Usuário Foi removido'}}</li>
        <li>Id Da Solicitação: {{ $solicitation->id}}</li>
    @endcan
    
    </ul>
    @can('is-admin')
        <form action="{{ route('solicitations.destroy', $solicitation->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar a Solicitação {{$solicitation->type_}}?')">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endcan

@endsection
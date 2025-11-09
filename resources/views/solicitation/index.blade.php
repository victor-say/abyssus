@extends('solicitation.layouts.app')

@section('title', 'Listagem de Solicitações')

@section('content')


    <h1>Solicitações</h1>

    <p>Voltar <a href="{{ route('dashboard')}}">(<)</a></p>

    @if (session()->has('success'))
        {{ session('success')}}        
    @endif
    
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif 


    <p>(<a href="{{ route('solicitations.create')}}">Novo</a>)</p>

    <table>
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Pedido</th>
                <th>Tipo</th>
                <th>Dia Que foi criado</th>
                <th>Ultima vez Que foi editado</th>

                <th colspan="2">Ações</th>
            </tr>
        </thead>
                @forelse ($solicitations as $solicitation)
                <tr>
                    <td>{{$solicitation->id_user}}</td>
                    <td>{{$solicitation->ask_}}</td>
                    <td>{{$solicitation->type_}}</td>
                    <td>{{$solicitation->created_at}}</td>
                    <td>{{$solicitation->updated_at}}</td>
                    <td>
                        <a href="{{ route('solicitations.edit', $solicitation->id) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('solicitations.show', $solicitation->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhuma Solicitação encontada no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$solicitations->links()}}

@endsection
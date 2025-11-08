@extends('demand.layouts.app')

@section('title', 'Listagem de Demandas')

@section('content')
    

    <h1>Demandas(pedidos)</h1>

    <p>Voltar <a href="{{ route('dashboard')}}">(<)</a></p>

    @if (session()->has('success'))
        {{ session('success')}}        
    @endif
    
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <p>(<a href="{{ route('demands.create')}}">Novo</a>)</p>

    <table>
        <thead> 
            <tr>
                <th>Nome do Usuário Que fez o pedido</th>
                <th>Nome do Livro pedido</th>
                <th>Data do pedido</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($demands as $demand)
                <tr>
                    <td>{{ $demand->name_asks_ }}</td>
                    <td>{{ $demand->book_asks_ }}</td>
                    <td>{{ $demand->date_asks }}</td>
                    <td>
                        <a href="{{ route('demands.edit', $demand->id) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('demands.show', $demand->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhuma demanda encontada no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$demands->links()}}

@endsection
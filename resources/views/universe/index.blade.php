@extends('universe.layouts.app')

@section('title', 'Listagem de Universos Literarios')

@section('content')


    <h1>Universos Literarios</h1>

    <p>Voltar <a href="{{ route('dashboard')}}">(<)</a></p>

    @if (session()->has('success'))
        {{ session('success')}}        
    @endif
    
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif 

    @can('is-admin')
        <p>(<a href="{{ route('universes.create')}}">Novo</a>)</p>
    @endcan

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Personagens</th>
                <th>Livros</th>
                <th>Conceitos</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
                @forelse ($universes as $universe)
                <tr>
                    <td>{{ $universe->name }}</td>
                    <td>{{ $universe->author }}</td>
                    <td>{{ $universe->personagens}}</td>
                    <td>{{ $universe->books }}</td>
                    <td>{{ $universe->conceitos }}</td>
                    <td>
                        <a href="{{ route('universes.edit', $universe->id) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('universes.show', $universe->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum Universo encontado no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$universes->links()}}

@endsection
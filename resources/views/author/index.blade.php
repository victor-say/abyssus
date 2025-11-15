@extends('author.layouts.app')

@section('title', 'Listagem de Autores')

@section('content')
    

    <h1>Autores</h1>

    <p>Voltar <a href="{{ route('dashboard')}}">(<)</a></p>

    @if (session()->has('success'))
        {{ session('success')}}        
    @endif
    
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif 

    @can('is-admin')
        <p>(<a href="{{ route('authors.create')}}">Novo</a>)</p>
    @endcan

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Gênero De escritas</th>
                <th>Principais obras</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->genero }}</td>
                    <td>{{ $author->main_Works }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author->id) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('authors.show', $author->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum Autor encontado no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$authors->links()}}

@endsection
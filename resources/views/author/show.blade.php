@extends('admin.layouts.app')


@section('title', 'detalhes do Autor')

@section('content')



    <h2>Detalhes do Autor {{ $author->name}}</h2>
    
    <a href='{{route('authors.index')}}'>Voltar(<)</a>
    
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

@endsection
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
        <form action="{{ route('universes.destroy', $universe->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar o Universe {{$universe->name}}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endcan

@endsection
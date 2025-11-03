@extends('author.layouts.app')

@section('title', 'Editar Autor')

@section('content')

    <h1>Editar Autor {{$author->name}}</h1>


    <p>Voltar<a href='{{route('authors.index')}}'>(<)</a></p>

    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('authors.update', $author->id)}}" method="post">
        @csrf
        @method('put')
        
        <label>Nome</label>
        <input type="text" name='name' placeholder="Nome Do Autor" value='{{ $author->name}}'>

        <label>Gênero</label>
        <input type="text" name='genero' placeholder="Principal gênero de escrita" value='{{ $author->genero}}'>
        
        <label>Principais Obras</label>
        <input type="text" name='main_Works' placeholder="Suas Principais Obras" value='{{ $author->main_Works}}'>
        
        <label>Principal Publico</label>
        <input type="text" name='public_' placeholder="Seu Publico principal" value='{{ $author->public_}}'>
        
        <button type="submit">Enviar</button>
    </form>
    


@endsection
    
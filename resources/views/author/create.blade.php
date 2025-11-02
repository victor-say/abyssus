@extends('authors.layouts.app')

@section('title', 'Cadastrar Novo Autor')

@section('content')

    <h1>Cadastrar Novo Autor</h1>

    <a href='{{route('authors.index')}}'>Voltar(<)</a>
    
    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
        'name', 'genero', 'main_Works'

    <form action="{{route('authors.store')}}" method="post">
        @csrf
        <label>Nome</label>
        <input type="text" name='name' placeholder="Nome Do Autor" value='{{old('name')}}'>

        <label>Gênero</label>
        <input type="text" name='genero' placeholder="Principal gênero de escrita" value='{{old('genero')}}'>
        
        <label>Principais Obras</label>
        <input type="text" name='main_Works' placeholder="Suas Principais Obras">
        
        <button type="submit">Enviar</button>
    </form>


@endsection
    
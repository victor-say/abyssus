@extends('universe.layouts.app')

@section('title', 'Cadastrar Novo Universo')

@section('content')

    <h1>Cadastrar Novo Universo</h1>

    
    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    <form action="{{route('universes.create')}}" method="post">
        @csrf
        <label>Nome</label>
        <input type="text" name="name" placeholder="Nome do Universo" value="{{old('name')}}">

        <label>Autor</label>
        <input type="text" name="author" placeholder="Nome do Autor do Universo" value="{{old('author')}}">

        <label>Personagens</label>
        <input type="text" name="personagens" placeholder="Personagens do Universo" value="{{old('personagens')}}">

        <label>Livros em que Aparace</label>
        <input type="text" name="books" placeholder="Livros que apresentam o Universo" value="{{old('books')}}">

        <label>Conceitos Importantes</label>
        <input type="text" name="conceitos" placeholder="Conceitos do Universo" value="{{old('conceitos')}}">

        <button type="submit">Enviar</button>
    </form>
    
    

@endsection
    
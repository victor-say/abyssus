@extends('universe.layouts.app')

@section('title', 'Editar Um Universo')

@section('content')

    <h1>Editar Um Universo {{$universe->name}}</h1>


    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('universes.update', $universe->id)}}" method="post">
        @csrf
        @method('put')
        <label>Nome</label>
        <input type="text" name="name" placeholder="Nome do Universo" value="{{$universe->name}}">

        <label>Autor</label>
        <input type="text" name="author" placeholder="Nome do Autor do Universo" value="{{$universe->author}}">

        <label>Personagens</label>
        <input type="text" name="personagens" placeholder="Personagens do Universo" value="{{$universe->personagens}}">

        <label>Livros em que Aparace</label>
        <input type="text" name="books" placeholder="Livros que apresentam o Universo" value="{{$universe->books}}">

        <label>Conceitos Importantes</label>
        <input type="text" name="conceitos" placeholder="Conceitos do Universo" value="{{$universe->conceitos}}">

        <button type="submit">Enviar</button>
    </form>


@endsection
    
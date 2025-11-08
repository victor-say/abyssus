@extends('demand.layouts.app')

@section('title', 'Editar demanda')

@section('content')

    <h1>Editar demanda</h1>

    
    <p>Voltar<a href='{{route('demands.index')}}'>(<)</a></p>

    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{route('demands.store', $demand->id)}}" method="post">
        @csrf
        {{-- <input type="hidden" name="name_asks_" value="{{$user->id}}"> --}}

        <label>Nome do livro </label>
        <input type="text" name='book_asks_' value='{{ $demand->book_asks_}}'>

        <button type="submit">Enviar</button>
    </form>


@endsection
    
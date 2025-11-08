@extends('demand.layouts.app')

@section('title', 'Cadastrar Nova demanda')

@section('content')

    <h1>Cadastrar Nova demanda</h1>

    
    <p>Voltar<a href='{{route('demands.index')}}'>(<)</a></p>

    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{route('demands.store')}}" method="post">
        @csrf
        {{-- <input type="hidden" name="name_asks_" value="{{$user->id}}"> --}}

        <label>Nome do livro </label>
        <input type="text" name='book_asks_' value='{{old('book_asks_')}}'>

        <label>Data do pedido</label>
        <input type="date" name="" value="{{old('date_asks')}}">

        <button type="submit">Enviar</button>
    </form>


@endsection
    
@extends('solicitation.layouts.app')

@section('title', 'Editar Solicitação')

@section('content')

    <h1>Editar Solicitação</h1>

    
    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    <form action="{{route('solicitations.store',$solicitation->id )}}" method="post">
        @csrf
        <label>Tipo De Solicitação</label>
        <select name="type_" value="{{$solicitation->type_}}">
            <option ></option>
            <option value="feadback">feadback</option>
            <option value="new_obra">Nova Obra</option>
        </select>

        <label>Tipo De Solicitação</label>
        <input type="text" name='ask_' placeholder="Escreva Sua Solicitação" value="{{$solicitation->ask_}}">

        <button type="submit">Enviar</button>
    </form>
    
    

@endsection
    
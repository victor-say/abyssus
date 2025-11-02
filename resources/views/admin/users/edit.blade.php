@extends('admin.layouts.app')

@section('title', 'Editar Usuário')

@section('content')

    <h1>Editar Usuário {{$user->name}}</h1>

    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('users.update', $user->id)}}" method="post">
        @csrf
        @method('put')
        <label>Nome</label>
        <input type="text" name='name' placeholder="Seu nome" value='{{ $user->name}}'>

        <label>E-mail</label>
        <input type="email" name='email' placeholder="Seu email" value='{{ $user->email}}'>
        
        <label>Class(leitor ou escritor)</label>
        <select name="class" value='{{ $user->class}}'>
            <option value=""> </option>
            <option value="escritor">escritor</option>
            <option value="leitor">leitor</option>
        </select>
        <p> Deseja mudar sua senha <a href="{{route('password.edit')}}">clique aqui </a></p>
        <button type="submit">Enviar</button>
    </form>


@endsection
    
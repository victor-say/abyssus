@extends('admin.layouts.app')

@section('title', 'Criar novo Usuário')

@section('content')

    <h1>novo Usuário</h1>

    @if ($errors->any)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <label>Nome</label>
        <input type="text" name='name' placeholder="Seu nome" value='{{old('name')}}'>

        <label>E-mail</label>
        <input type="email" name='email' placeholder="Seu email" value='{{old('email')}}'>
        
        <label>Class(leitor ou escritor)</label>
        <select name="class" value='{{old('class')}}'>
            <option value=""> </option>
            <option value="escritor">escritor</option>
            <option value="leitor">leitor</option>
        </select>
        
        <label>senha</label>
        <input type="password" name='password' placeholder="Sua senha">
        
        <button type="submit">Enviar</button>
    </form>


@endsection
    
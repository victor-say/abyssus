@extends('admin.layouts.app')


@section('title', 'detalhes do Usuário')

@section('content')



    <h2>Detalhes do Usuário {{ $user->name}}</h2>
    
    <a href='{{route('users.index')}}'>Voltar(<)</a>
    
    <ul>
        <li>ID: {{ $user->id}}</li>
        <li>Nome: {{ $user->name}}</li>
        <li>E-mail: {{ $user->email}}</li>
        <li>class: {{ $user->class}}</li>
    </ul>
    @can('is-admin')
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar o usuário {{$user->name}}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endcan

@endsection
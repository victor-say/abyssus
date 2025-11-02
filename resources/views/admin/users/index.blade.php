@extends('admin.layouts.app')

@section('title', 'Listagem de Usuários')

@section('content')
    

    <h1>Usuários</h1>

    @if (session()->has('success'))
        {{ session('success')}}        
    @endif
    
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif


    <p>Novo (<a href="{{ route('users.create')}}">+</a>)</p>
    
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Class</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->class }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum Usuário encontado no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$users->links()}}

@endsection
{{-- @extends('admin.layouts.app')

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
     --}}








@extends('admin.layouts.app')

@section('title', 'Editar Usuário')

@section('content')

<div class="min-h-screen bg-gray-400 flex items-center justify-center p-6">

    <div class="w-full max-w-xl bg-zinc-300 p-8 rounded-lg shadow-lg shadow-indigo-500/50">

        <h1 class="text-2xl font-bold text-center mb-6">Editar Usuário {{$user->name}}</h1>


        @if ($errors->any())
            <ul class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">• {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4 ">
            @csrf
            @method('put')
            <div>
                <label class="block font-medium mb-1">Nome</label>
                <input type="text" name="name" placeholder="Seu nome" value="{{ $user->name }}" class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>


            <div>
                <label class="block font-medium mb-1">E-mail</label>
                <input type="email" name="email" placeholder="Seu email" value="{{ $user->email }}"class="w-full px-4 py-2 rounded-[20vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Class (leitor ou escritor)</label>
                <select name="class" class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="{{ $user->class }}">Selecione...</option>
                    <option value="escritor" @selected(old('class')=='escritor')>Escritor</option>
                    <option value="leitor" @selected(old('class')=='leitor')>Leitor</option>
                </select>
            </div>


            <button type="submit" class="w-full bg-slate-700 text-white py-2 rounded hover:bg-slate-600 transition font-semibold">
                Enviar
            </button>

        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('users.index') }}" class="text-cyan-600 hover:underline">← Voltar</a>
        </div>
        <p class="text-blue-600 text-center">
            <a href="{{route('password.edit', $user->id)}}" class="text-blue-800">Deseja mudar sua Senha</a>
        </p>


    </div>

</div>

@endsection

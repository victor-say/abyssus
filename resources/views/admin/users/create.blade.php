@extends('admin.layouts.app')

@section('title', 'Criar novo Usuário')

@section('content')

<div class="min-h-screen bg-gray-400 flex items-center justify-center p-6">

    <div class="w-full max-w-xl bg-zinc-300 p-8 rounded-lg shadow-lg shadow-indigo-500/50">

        <h1 class="text-2xl font-bold text-center mb-6">Novo Usuário</h1>


        @if ($errors->any())
            <ul class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">• {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('users.store') }}" method="POST" class="space-y-4 ">
            @csrf

            <div>
                <label class="block font-medium mb-1">Nome</label>
                <input type="text" name="name" placeholder="Seu nome" value="{{ old('name') }}" class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>


            <div>
                <label class="block font-medium mb-1">E-mail</label>
                <input type="email" name="email" placeholder="Seu email" value="{{ old('email') }}"class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Class (leitor ou escritor)</label>
                <select name="class" class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="{{ old('class')}}">Selecione...</option>
                    <option value="escritor" @selected(old('class')=='escritor')>Escritor</option>
                    <option value="leitor" @selected(old('class')=='leitor')>Leitor</option>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Senha</label>
                <input type="password" name="password" placeholder="Sua senha" class="w-full px-4 py-2 rounded-[20vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <button type="submit" class="w-full bg-slate-700 text-white py-2 rounded hover:bg-slate-600 transition font-semibold">
                Enviar
            </button>

        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('users.index') }}" class="text-cyan-600 hover:underline">← Voltar</a>
        </div>

    </div>

</div>

@endsection

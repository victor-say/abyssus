@extends('book.layouts.app')

@section('title', 'Cadastrar Novo Livro')

@section('content')


    
    <div class="min-h-screen bg-gray-400 flex items-center justify-center p-6">

    <div class="w-full max-w-xl bg-zinc-300 p-8 rounded-lg shadow-lg shadow-indigo-500/50">

        <h1 class="text-2xl font-bold text-center mb-6">Cadastrar Novo Livro</h1>


        @if ($errors->any())
            <ul class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">• {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('books.store') }}" method="POST" class="space-y-4 ">
            @csrf

            <div>
                <label class="block font-medium mb-1">Nome</label>
                <input type="text" name="name" placeholder="Nome do livro" value="{{ old('name') }}" class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Autor</label>
                <input type="text" name="author" placeholder="Autor Do Livro" value="{{ old('author') }}"class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Numero De Páginas</label>
                <input type="number" name="pages" placeholder="Numero De Páginas" value="{{ old('pages') }}"class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Editora</label>
                <input type="text" name="publisher" placeholder="Editora Que o Publica" value="{{ old('publisher')}}" class="w-full px-4 py-2 rounded-[20vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Universo</label>
                <input type="text" name="universe" placeholder="Universo A que pertence" value="{{ old('universe') }}" class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Sinopse</label>
                <input type="text" name="synopsis" placeholder="Sinopse do Livro" value="{{ old('synopsis') }}"class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Gênero</label>
                <input type="text" name="genero" placeholder="Gênero do Livro" value="{{ old('genero') }}"class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Publico Alvo</label>
                <input type="text" name="public" placeholder="Publico Alvo" value="{{ old('public')}}" class="w-full px-4 py-2 rounded-[20vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            


            <button type="submit" class="w-full bg-slate-700 text-white py-2 rounded hover:bg-slate-600 transition font-semibold">
                Enviar
            </button>

        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('books.index') }}" class="text-cyan-600 hover:underline">← Voltar</a>
        </div>

    </div>

</div>

@endsection
    




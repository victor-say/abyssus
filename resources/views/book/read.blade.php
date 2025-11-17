@extends('book.layouts.app')


@section('title', 'Sinopse do Livro')

@section('content')

<div class="min-h-screen flex justify-center items-center  bg-gray-700">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-3xl" >

        <div  class="flex justify-between items-center border-b pb-2">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Sinopse do Livro {{ $book->name}}
            </h2>
            <a href="{{ route('books.show', $book->id) }}" class="flex w-30 items-center gap-2 px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                </svg>
                Voltar
            </a>
        </div>

        <article class="text-blue-950">
            <!-- título secundário (opcional) -->
            <h3 class="sr-only">Sinopse</h3>

            <!-- Aqui aplicamos text-justify + fallback inline + whitespace-pre-line -->
            <p class="text-lg text-slate-900 text-justify leading-relaxed break-words whitespace-pre-line"
               style="text-align: justify;">
                {{ $book->synopsis }}
            </p>
        </article>

    </div>

</div>

@endsection

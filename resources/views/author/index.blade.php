{{-- @extends('author.layouts.app')

@section('title', 'Listagem de Autores')

@section('content')
    

    <h1>Autores</h1>

    <p>Voltar <a href="{{ route('dashboard')}}">(<)</a></p>

    @if (session()->has('success'))
        {{ session('success')}}        
    @endif
    
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif 

    @can('is-admin')
        <p>(<a href="{{ route('authors.create')}}">Novo</a>)</p>
    @endcan
 
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Gênero De escritas</th>
                <th>Principais obras</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->genero }}</td>
                    <td>{{ $author->main_Works }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author->id) }}">Editar</a>
                    </td>
                    <td>
                        <a href="{{ route('authors.show', $author->id) }}">Detalhes</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum Autor encontado no banco</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$authors->links()}}

@endsection --}}











@extends('author.layouts.app')

@section('title', 'Listagem de Autores')

@section('content')

<div class="flex min-h-screen bg-gray-400">

    <main class="flex-1 p-6">
        
        <header class="w-full bg-zinc-300 shadow-lg shadow-indigo-500/50 rounded-lg p-4 mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-semibold">Autores</h1>
                </div>
                
                <a href="{{ route('dashboard')}}" 
                   class="flex items-center gap-2 px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                    </svg>
                    Voltar
                </a>
            </div>

            @if (session()->has('success'))
                <p class="mt-3 text-green-600 font-medium">{{ session('success') }}</p>
            @endif
            
            @if (session('message'))
                <p class="mt-3 text-blue-600 font-medium">{{ session('message') }}</p>
            @endif


                <div class="mt-4">
                    <a href="{{ route('authors.create')}}" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500 text-white font-medium rounded hover:bg-cyan-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        Novo Autor
                    </a>
                </div>

        </header>


        <div class="bg-zinc-300 rounded-lg shadow-lg shadow-indigo-500/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-700 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Gênero</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Principais Obras</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-400">
                        @forelse ($authors as $author)
                            <tr class="hover:bg-gray-200 transition-colors">
                                <td class="px-6 py-3">{{ $author->name }}</td>
                                <td class="px-6 py-3">{{ $author->genero }}</td>
                                <td class="px-6 py-3">{{ $author->main_Works }}</td>
                                <td class="px-6 py-3 text-center">
                                    <a href="{{ route('authors.edit', $author->id) }}" class="inline-flex items-center gap-1 px-3 py-1 bg-orange-700 text-white text-sm rounded hover:bg-orange-400 transition-colors">
                                        Editar

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>

                                    </a>
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <a href="{{ route('authors.show', $author->id) }}" class="inline-flex items-center gap-1 px-3 py-1 bg-blue-800 text-white text-sm rounded hover:bg-blue-600 transition-colors">
                                        Detalhes

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-600">
                                    Nenhum Autor encontrado no banco
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginação -->
        <div class="mt-6">
            {{ $authors->links() }}
        </div>

    </main>
</div>

@endsection

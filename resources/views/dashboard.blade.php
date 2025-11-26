@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<div class="flex min-h-screen bg-gray-400">

    <aside class="w-46 bg-slate-700 border-b shadow-md">

        <nav class="mt-4 space-y-1">

            <a href="{{route('users.show', auth()->user()->id)}}"   class="block px-4 py-2 hover:bg-gray-200 rounded text-lg text-justify">
                <div class="flex">
                    <div class="flex-1 ">
                        Perfil
                        <p class ='text-xs' >({{auth()->user()->name}})</p>
                    </div>

                    <div class="flex-1 inline-block align-middle">  
                        <svg class='h-[1.5rem]' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                </div>
            </a>
            
        
            <a href="{{route('users.index')}}"   class="block px-4 py-2 hover:bg-gray-200 rounded text-lg text-justify">
                <div class="flex">
                    <div class="flex-1 ">
                        Usuários
                    </div>

                    <div class="flex-1 inline-block align-middle">  
                        <svg class='h-[1.5rem]' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                </div>
            </a>

          


            <a href="{{route('solicitations.index')}}" class="block px-4 py-2 hover:bg-gray-200 rounded text-lg   text-justify">
                <div class="flex">
                    <div class="flex-1">
                        Solicitations
                    </div>

                    <div class="flex-1 inline-block align-middle">
                        <svg class='h-[1.5rem]' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </div>
                </div>
            </a>

        </nav>
    </aside>


    <main class="flex-1 p-6">

        <header class="w-full bg-zinc-300 shadow-lg  shadow-indigo-500/50 rounded-lg  p-4 mb-6 flex justify-between items-center  ">

            <div class="ext-wrap">
                <h2 class="text-lg font-semibold">
                    Bem-vindo(a), {{ auth()->user()->name }}!
                </h2>
                <p  class="text-md ">
                    O que você deseja ver hoje ?
                </p>


                <div class="text-blue-500">
                    @if (session()->has('success'))
                        {{ session('success')}}        
                    @endif
                    
                    @if (session('message'))
                        <p>{{ session('message') }}</p>
                    @endif
                </div>


            </div>
    

        </header>

        {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="bg-zinc-300 p-6 rounded-lg shadow-lg shadow-indigo-500/50">
                <h3 class="text-xl font-semibold">Books</h3>
                <p>
                    Explore
                    <a href="{{ route('books.index')}}" class="text-cyan-500">Books</a>
                </p>
            </div>

            <div class="bg-zinc-300 p-6 rounded-lg shadow-lg shadow-indigo-500/50">
                <h3 class="text-xl font-semibold">Universes</h3>
                <p>
                    Explore 
                    <a href="{{ route('universes.index')}}" class="text-cyan-500">Universos</a>
                </p>
            </div>

            <div class="bg-zinc-300 p-6 rounded-lg shadow-lg shadow-indigo-500/50">
                <h3 class="text-xl font-semibold">Authors</h3>
                <p>
                    Explorar 
                    <a href="{{ route('authors.index')}}" class="text-cyan-500">Authors</a>
                </p>

            </div>

        </div> --}}


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-zinc-300 p-6 rounded-xl shadow-lg shadow-indigo-500/30 transition-all duration-300 hover:scale-105 hover:shadow-indigo-500/80 hover:-translate-y-1">
                <h3 class="text-xl font-semibold">Books</h3>
                <p>
                    Explore
                    <a href="{{ route('books.index')}}" class="text-cyan-600 underline">Livros</a>
                </p>
            </div>

            <div class="bg-zinc-300 p-6 rounded-xl shadow-lg shadow-indigo-500/30 transition-all duration-300 hover:scale-105 hover:shadow-indigo-500/80 hover:-translate-y-1">
                <h3 class="text-xl font-semibold">Universes</h3>
                <p>
                    Explore
                    <a href="{{ route('universes.index')}}" class="text-cyan-600 underline">Universos</a>
                </p>
            </div>

            <div class="bg-zinc-300 p-6 rounded-xl shadow-lg shadow-indigo-500/30 transition-all duration-300 hover:scale-105 hover:shadow-indigo-500/80 hover:-translate-y-1">
                <h3 class="text-xl font-semibold">Authors</h3>
                <p>
                    Explore
                    <a href="{{ route('authors.index')}}" class="text-cyan-600 underline">Autores</a>
                </p>
            </div>

        </div>

    </main>
</div>

@endsection

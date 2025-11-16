@extends('admin.layouts.app')

@section('title', 'Editar Senha')

@section('content')

<div class="min-h-screen bg-gray-400 flex items-center justify-center p-6">

    <div class="w-full max-w-xl bg-zinc-300 p-8 rounded-lg shadow-lg shadow-indigo-500/50">

        <h1 class="text-2xl font-bold text-center mb-6">Editar Usuário</h1>


        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="space-y-4 ">


            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium mb-1">Senha atual</label>
                <input type="password" name="current_password" autocomplete="current-password"class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('current_password') <div style="color:red">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Nova senha</label>
                <input type="password" name="password" autocomplete="new-password"class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('password') <div style="color:red">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Confirmar nova senha</label>
                <input type="password" name="password_confirmation" autocomplete="new-password"class="w-full px-4 py-2 rounded-full bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
                <button type="submit" class="w-full bg-slate-700 text-white py-2 rounded hover:bg-slate-600 transition font-semibold">
                    Enviar
                </button>

        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('users.index') }}" class="text-cyan-600 hover:underline">← Voltar</a>
        </div>
        <p class="text-blue-600 text-center">
            <a href="{{route('password.edit')}}" class="text-blue-800">Deseja mudar sua Senha</a>
        </p>


    </div>

</div>

@endsection

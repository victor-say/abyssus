@extends('solicitation.layouts.app')

@section('title', 'Editar Solicitação')

@section('content')


    <div class="min-h-screen bg-gray-400 flex items-center justify-center p-6">

    <div class="w-full max-w-xl bg-zinc-300 p-8 rounded-lg shadow-lg shadow-indigo-500/50">

        <h1 class="text-2xl font-bold text-center mb-6">Edite Sua Solicitação</h1>


        @if ($errors->any())
            <ul class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">• {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{route('solicitations.update',$solicitation->id )}}" method="POST" class="space-y-4 ">
            @csrf
            @method('put')

            <div>
                <label class="block font-medium mb-1">Tipo Da Solicitação</label>
                <select name="type_" class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecione...</option>
                    <option value="feadback" @selected(old('type_', $solicitation->type_) == 'feadback')}>feadback</option>
                    <option value="new_obra" @selected(old('type_', $solicitation->type_) == 'new_obra')}>Nova Obra</option>
                </select>
            </div>


            <div>
                <label class="block font-medium mb-1">Descrição</label>
                <input type="text" name="ask_" placeholder="Descreva Sua Solicitação" value="{{ $solicitation->ask_ }}"class="w-full px-4 py-2 rounded-[10vw] bg-white border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
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
    




@extends('universe.layouts.app')


@section('title', 'detalhes do Universo')

@section('content')



<div class="min-h-screen flex justify-center items-center  bg-gray-700">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-3xl" >

        <div  class="flex justify-between items-center border-b pb-2">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Detalhes do Universo {{ $universe->name}}
            </h2>
            <a href="{{ route('universes.index')}}" class="flex w-30 items-center gap-2 px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                </svg>
                Voltar
            </a>
        </div>


        <ul class=" text-lg space-y-3 text-slate-900">
            <li><strong class="font-semibold   text-blue-950">Nome:</strong> {{ $universe->name }}</li>
            <li><strong class="font-semibold   text-blue-950">Autor:</strong> {{ $universe->author }}</li>
            <li><strong class="font-semibold   text-blue-950">Personagem Principal:</strong> {{ $universe->personagens }}</li>
            <li><strong class="font-semibold   text-blue-950">Livro Em Que O Apresenta:</strong> {{ $universe->books }}</li>
            <li><strong class="font-semibold   text-blue-950">Conceitos:</strong> {{ $universe->conceitos }}</li>
        </ul>

        <div class="flex gap-4 mt-8">


                <a href="{{ route('universes.edit', $universe->id) }}" class="inline-flex items-center gap-1 px-3 py-1 bg-orange-700 text-white text-sm rounded hover:bg-orange-400 transition-colors">                            
                    Editar

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />                    
                    </svg>
                </a>

                <button type="button"onclick="confirmDelete({{ $universe->id }})"  class="inline-flex items-center gap-1 px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-800 transition-colors">
                    Excluir

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>

                </button>

                <form id="deleteForm{{ $universe->id }}" action="{{ route('universes.destroy', $universe->id) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>



        </div>

    </div>

</div>



<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Tem certeza que deseja deletar o universo {{$universe->name}}?',
        text: "Esta ação não pode ser desfeita!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm' + id).submit();
        }
    });
}
</script>

@endsection

@extends('admin.layouts.app')


@section('title', 'Senha')
 

@section('content')
<div>

    <h2>Editar senha do Usuário</h2>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Senha atual</label>
            <input type="password" name="current_password" autocomplete="current-password">
            @error('current_password') <div style="color:red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Nova senha</label>
            <input type="password" name="password" autocomplete="new-password">
            @error('password') <div style="color:red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Confirmar nova senha</label>
            <input type="password" name="password_confirmation" autocomplete="new-password">
        </div>

        <button type="submit">Atualizar senha</button>
    </form>
</div>
@endsection

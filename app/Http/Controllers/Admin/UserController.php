<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Models\user;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request )
    {
        //User::create($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'class' =>$request->class,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('users.index') -> with('success', ' Usuário criado com sucesso');
    }

    public function edit(string $id)
    {
        //$user = User::where('id',$id)->first();
        
        if(!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update( UpdateUserRequest $request, string $id)
    {
        if(!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        }

        $user->update($request->only([
            'name',
            'email',
            'class',
        ]));

        return redirect()->route('users.index')->with('message', 'Usuário editado com sucesso');
        
    }

    public function show(string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não foi encontrado');
        }

        return view('admin.users.show', compact ('user'));
    }

    public function destroy(string $id)
    {
        // if(Gate::denies('is-admin'))
        // {
        //     return back()->with('message', 'Você não é um  administrador');
        // }
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não foi encontrado');
        }

        $user->delete();

        return redirect()->route('users.index')->with('message', 'Usuário deletado com sucesso');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('admin.users.edit_password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Senha atual incorreta']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password)
        ])->save();

        return redirect()->route('users.index')->with('success', 'Senha alterada com sucesso!');
    }
}

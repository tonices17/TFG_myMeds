<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $requestData = $request->validated();

        if (empty($requestData['password'])) {
            $requestData['password'] = $user->password;
        }

        $user->update($requestData);

        return redirect()->route('users.edit', compact('user'))->with('success', 'Usuario editado exitosamente');
    }

    public function show()
    {
        $usuario = auth()->user();

        return view('profile', compact('usuario'));
    }

    public function destroy(User $user)
    {
        //
        $user->delete();
        $userLogeado = auth()->user();

        if ($userLogeado) {
            return redirect()->route('users.index')->with('success', 'Usuario borrado exitosamente');
        } else {
            return redirect()->route('mymeds');
        }
    }
}

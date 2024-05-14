<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTratamientoRequest;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TratamientoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Verificar el rol del usuario autenticado
        if ($user->hasRole('admin')) {
            // Si el usuario es administrador, obtener todos los tratamientos
            $tratamientos = Tratamiento::all();
        } else {
            // Si el usuario tiene el rol de usuario, obtener los tratamientos asociados con su user_id
            $tratamientos = Tratamiento::where('user_id', $user->id)->get();
        }

        // Retornar la vista con los tratamientos correspondientes
        return view('tratamientos.index', compact('tratamientos'));
    }

    public function create()
    {
        return view('tratamientos.create');
    }

    public function store(StoreTratamientoRequest $request)
    {
        //
        Tratamiento::create($request->validated());

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento creado exitosamente');
    }
}

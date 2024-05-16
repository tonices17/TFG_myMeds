<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTratamientoRequest;
use App\Models\Tratamiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TratamientoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Verificar el rol del usuario autenticado
        $tratamientos = Auth::user()->hasRole('admin')
            ? Tratamiento::all()
            : Tratamiento::where('user_id', Auth::user()->id)->get();

        $tratamientos->transform(function ($tratamiento) {
            if ($tratamiento->duracion_tratamiento == 0) {
                $tratamiento->duracion_tratamiento = "Indefinido";
            } else {
                $fechaInicio = Carbon::createFromFormat('Y-m-d', $tratamiento->fecha_inicio);
                $tratamiento->duracion_tratamiento = $fechaInicio->addDays($tratamiento->duracion_tratamiento)->format('Y-m-d');
            }

            return $tratamiento;
        });

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

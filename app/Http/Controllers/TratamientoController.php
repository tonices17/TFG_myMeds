<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;
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

    public function create(Request $request)
    {
        $nombre = $request->query('nombre', '');

        return view('tratamientos.create', compact('nombre'));
    }

    public function store(StoreTratamientoRequest $request)
    {
        //
        Tratamiento::create($request->validated());

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento creado exitosamente');
    }

    public function edit(Tratamiento $tratamiento)
    {
        return view('tratamientos.edit', compact('tratamiento'));
    }

    public function update(UpdateTratamientoRequest $request, Tratamiento $tratamiento)
    {
        $requestData = $request->validated();

        $tratamiento->update($requestData);

        return redirect()->route('tratamientos.edit', compact('tratamiento'))->with('success', 'Tratamiento editado exitosamente');
    }

    public function destroy(Tratamiento $tratamiento)
    {
        //
        $tratamiento->delete();

        return back()->with('success', 'Tratamiendo borrado exitosamente');
    }
}

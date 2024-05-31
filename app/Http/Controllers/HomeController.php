<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener tratamientos del usuario actual
        $tratamientos = Tratamiento::where('user_id', auth()->id())->get();

        // Formatear los datos para FullCalendar
        $eventos = [];
        foreach ($tratamientos as $tratamiento) {
            $start_date = \Carbon\Carbon::parse($tratamiento->fecha_inicio);

            // Calcular la fecha de fin del tratamiento
            $end_date = ($tratamiento->duracion_tratamiento == 0) ?
                null : // No establecer fecha de fin si la duración es indefinida
                $start_date->copy()->addDays($tratamiento->duracion_tratamiento);

            $evento = [
                'title' => $tratamiento->medicamento, // Nombre del tratamiento
                'start' => $tratamiento->fecha_inicio, // Fecha de inicio del tratamiento
                'end' => $end_date, // Fecha de fin del tratamiento
                'color' => ($tratamiento->duracion_tratamiento == 0) ? '#F36A5C' : '#8fdf82', // Color dependiendo de la duración
                'rendering' => ($tratamiento->duracion_tratamiento == 0) ? 'background' : '', // Tratamientos indefinidos como eventos de fondo
                'allDay' => true, // Mostrar eventos como de todo el día
            ];

            // Si es indefinido, crear eventos diarios
            if ($tratamiento->duracion_tratamiento == 0) {
                $current_date = $start_date->copy();
                $end_limit = $start_date->copy()->addYears(50); // Un límite razonable de visualización

                while ($current_date->lessThan($end_limit)) {
                    $eventos[] = [
                        'title' => $tratamiento->medicamento,
                        'start' => $current_date->toDateString(),
                        'color' => 'red',
                        'allDay' => true,
                    ];
                    $current_date->addDay();
                }
            } else {
                $eventos[] = $evento;
            }
        }

        return view('home', compact('eventos'));
    }
}

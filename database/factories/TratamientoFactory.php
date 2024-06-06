<?php

namespace Database\Factories;

use App\Models\Tratamiento;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TratamientoFactory extends Factory
{
    protected $model = Tratamiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'nombre' => $this->faker->name(),
            'medicamento' => 'Paracetamol',
            'frecuencia_toma' => $this->faker->numberBetween(1, 24), // frecuencia en horas
            'created_at' => Carbon::now()->subHours($this->faker->numberBetween(1, 24)),
            'duracion_tratamiento' => $this->faker->numberBetween(0, 30), // duración en días
            'fecha_inicio' => Carbon::now()->subDays($this->faker->numberBetween(0, 30)),
        ];
    }
}

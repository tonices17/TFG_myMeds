<?php

namespace Tests\Feature;

use App\Models\Tratamiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SendReminderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_reminder_messages()
    {
        $user = User::factory()->create([
            'id' => 2,
            'phone_number' => '+1234567890'
        ]);

        $tratamiento = Tratamiento::factory()->create([
            'user_id' => $user->id,
            'nombre' => 'Test Tratamiento',
            'medicamento' => 'Paracetamol',
            'frecuencia_toma' => 8, // frecuencia como entero
            'created_at' => Carbon::now()->subHours(8),
            'duracion_tratamiento' => 30, // duración en días
            'fecha_inicio' => Carbon::now()->subDays(1)
        ]);

        $this->artisan('app:send-reminder')
            ->expectsOutput("Mensaje enviado a {$user->phone_number} para el tratamiento {$tratamiento->nombre}.")
            ->assertExitCode(0);
    }
}

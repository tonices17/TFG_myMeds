<?php

namespace App\Console\Commands;

use App\Models\Tratamiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Twilio\Rest\Client;

class SendReminder extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send WhatsApp reminders for active treatments';

    public function handle()
    {
        // Obtener tratamientos activos
        $tratamientosUsuarioDos = Tratamiento::where('user_id', 2)->get();
        $tratamientosActivos = [];

        foreach ($tratamientosUsuarioDos as $tratamientoUser2) {
            $fechaInicio = Carbon::parse($tratamientoUser2->fecha_inicio);
            $duracionTratamiento = $tratamientoUser2->duracion_tratamiento;

            // Calcular la fecha final del tratamiento
            $fechaFinalTratamiento = $fechaInicio->addDays($duracionTratamiento);

            if (!Carbon::now()->greaterThanOrEqualTo($fechaFinalTratamiento)) {
                $tratamientosActivos[] = $tratamientoUser2;
            }
        }

        foreach ($tratamientosActivos as $tratamiento) {
            // Calcular la próxima hora de toma
            $proximoToma = Carbon::parse($tratamiento->created_at)
                ->addHours($tratamiento->frecuencia_toma);

            // Calcular el tiempo para enviar el mensaje (5 minutos antes de la próxima toma)
            $tiempoEnvio = $proximoToma->subMinutes(5);
            echo $tiempoEnvio;

            $ahora = Carbon::now();
            // Si es hora de enviar el mensaje
            if ($ahora->greaterThanOrEqualTo($tiempoEnvio)) {
                // Obtener el usuario correspondiente
                $usuario = User::find($tratamiento->user_id);

                // Enviar mensaje de WhatsApp
                $this->sendWhatsAppMessage($usuario->phone_number, $tratamiento->nombre, $tratamiento->medicamento);

                echo "Mensaje enviado con exito";
                // Actualizar la próxima hora de toma
                $tratamiento->created_at = Carbon::now()->addHours($tratamiento->frecuencia_toma);
                $tratamiento->save();
            }
        }
    }

    private function sendWhatsAppMessage($to, $tratamiento, $medicamento)
    {
        $sid    = env('TWILIO_SID');
        $token  = env('TWILIO_TOKEN');
        $from   = env('TWILIO_WHATSAPP_SANDBOX_NUMBER');

        $client = new Client($sid, $token);

        $message = "Recordatorio: Es hora de tomar tu medicamento {$medicamento} de {$tratamiento}.";

        // Enviar el mensaje a través de Twilio
        $client->messages->create(
            "whatsapp:+34{$to}",
            [
                'from' => "whatsapp:{$from}",
                'body' => $message
            ]
        );
    }
}

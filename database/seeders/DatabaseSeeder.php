<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tratamiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone_number' => '123456789',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Antonio Céspedes',
            'email' => 'tonices17@gmail.com',
            'phone_number' => '647914881',
            'password' => Hash::make('12345678'),
        ]);

        \App\Models\Tratamiento::factory(5)->create();

        Tratamiento::factory()->create([
            'user_id' => 2,
            'nombre' => 'Azucar',
            'descripcion' => 'Descripción de mi tratamiento',
            'medicamento' => 'Paracetamol',
            'frecuencia_toma' => 8, // frecuencia en horas
            'created_at' => Carbon::now(),
            'duracion_tratamiento' => 15, // duración en días
            'fecha_inicio' => Carbon::now(),
        ]);

        $this->call(RolesTableSeeder::class);
    }
}

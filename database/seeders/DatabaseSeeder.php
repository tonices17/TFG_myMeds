<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone_number' => '123456789',
            'password' => Hash::make('12345678'),
        ]);

        $user = User::factory()->create([
            'name' => 'Antonio Céspedes',
            'email' => 'tonices17@gmail.com',
            'phone_number' => '647914881',
            'password' => Hash::make('12345678'),
        ]);
        
        $this->call(RolesTableSeeder::class);
    }
}

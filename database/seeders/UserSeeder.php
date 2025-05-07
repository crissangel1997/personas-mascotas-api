<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

        User::firstOrCreate(
            ['email' => 'admin@example.com'], // condición para evitar duplicado
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'), // contraseña conocida
            ]
        );

    }
}

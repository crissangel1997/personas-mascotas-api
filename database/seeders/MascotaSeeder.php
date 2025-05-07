<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mascota;
use App\Models\User;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mascota::factory(3)->create(); // Crea 3 mascotas asociadas a personas
    }
}

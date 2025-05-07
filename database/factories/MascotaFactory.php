<?php

namespace Database\Factories;

use App\Models\Mascota;
use App\Models\Persona;

use Illuminate\Database\Eloquent\Factories\Factory;

class MascotaFactory extends Factory
{
    protected $model = Mascota::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'especie' => $this->faker->randomElement(['perro', 'gato']),
            'raza' => $this->faker->word,
            'edad' => $this->faker->numberBetween(1, 15),
            'persona_id' => Persona::factory(), // Relación automática
            'imagen' => $this->faker->imageUrl(),
        ];
    }
}

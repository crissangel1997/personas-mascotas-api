<?php

namespace Database\Factories;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '-18 years'),
            'user_id' => User::factory(),
        ];
    }
}

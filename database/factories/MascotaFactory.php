<?php

namespace Database\Factories;

use App\Models\Mascota;
use App\Models\Persona;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Eloquent\Factories\Factory;

class MascotaFactory extends Factory
{
    protected $model = Mascota::class;

    public function definition()
    {
        // Elegimos la especie aleatoriamente
        $especie = $this->faker->randomElement(['perro', 'gato']);

        // Endpoint para obtener imagen aleatoria
        $apiBase = $especie === 'perro' ? 'thedogapi' : 'thecatapi';
        $endpoint = "https://api.{$apiBase}.com/v1/images/search";

        // Hacemos la petición (sin verificar SSL para evitar bloqueos locales)
        $response = Http::withoutVerifying()->get($endpoint);
        $data = $response->json();
        // Sacamos la URL si existe
        $imagenUrl = $data[0]['url'] ?? null;

        return [
            'nombre'      => $this->faker->firstName,
            'especie'     => $especie,
            'raza'        => $this->faker->word,
            'edad'        => $this->faker->numberBetween(1, 15),
            'persona_id'  => Persona::factory(),
            'imagen'      => $imagenUrl,
        ];
    }
}

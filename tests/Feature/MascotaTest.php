<?php

namespace Tests\Feature;

use App\Models\Mascota;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MascotaTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {
        $user = User::where('email', 'admin@example.com')->first();
        return $this->actingAs($user, 'sanctum');
    }

    public function test_usuario_puede_listar_mascotas()
    {
        $this->authenticate();

        Mascota::factory()->count(3)->create();

        $response = $this->getJson('/api/mascotas');

        $response->assertStatus(200)
                 ->assertJsonStructure(['data', 'meta']);
    }

    public function test_usuario_puede_crear_una_mascota()
    {
        $this->authenticate();

        $persona = Persona::factory()->create();

        $data = [
            'nombre' => 'Firulais',
            'especie' => 'perro',
            'raza' => 'Labrador',
            'edad' => 4,
            'persona_id' => $persona->id,
        ];

        $response = $this->postJson('/api/mascotas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Firulais']);
    }

    public function test_falla_si_no_se_envian_campos_requeridos()
    {
        $this->authenticate();

        $response = $this->postJson('/api/mascotas', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nombre', 'especie', 'persona_id']);
    }

    public function test_usuario_puede_actualizar_una_mascota()
    {
        $this->authenticate();

        $mascota = Mascota::factory()->create();

        $response = $this->putJson("/api/mascotas/{$mascota->id}", [
            'nombre' => 'Gato Feliz',
            'especie' => 'gato',
            'raza' => 'Siames',
            'edad' => 3,
            'persona_id' => $mascota->persona_id,
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nombre' => 'Gato Feliz']);
    }

    public function test_usuario_puede_eliminar_una_mascota()
    {
        $this->authenticate();

        $mascota = Mascota::factory()->create();

        $response = $this->deleteJson("/api/mascotas/{$mascota->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('mascotas', ['id' => $mascota->id]);
    }
}


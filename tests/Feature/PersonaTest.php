<?php
namespace Tests\Feature;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonaTest extends TestCase
{
    use RefreshDatabase;


    protected function authenticate()
    {
        $user = User::where('email', 'admin@example.com')->first();
        return $this->actingAs($user, 'sanctum');
    }

    public function test_usuario_puede_listar_personas()
    {
        $this->authenticate();

        Persona::factory()->count(5)->create();

        $response = $this->getJson('/api/personas');

        $response->assertStatus(200)
                 ->assertJsonStructure(['data', 'meta']);
    }

    public function test_usuario_puede_crear_una_persona()
    {
        $this->authenticate();

        $data = [
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'fecha_nacimiento' => '1990-05-10',
        ];

        $response = $this->postJson('/api/personas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Juan Pérez']);
    }

    public function test_validacion_falla_si_faltan_campos()
    {
        $this->authenticate();

        $response = $this->postJson('/api/personas', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nombre', 'email', 'fecha_nacimiento']);
    }

    public function test_usuario_puede_actualizar_una_persona()
    {
        $this->authenticate();

        $persona = Persona::factory()->create();

        $response = $this->putJson("/api/personas/{$persona->id}", [
            'nombre' => 'Nombre Actualizado',
            'email' => 'nuevo@example.com',
            'fecha_nacimiento' => '1985-01-01',
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nombre' => 'Nombre Actualizado']);
    }

    public function test_usuario_puede_eliminar_una_persona()
    {
        $this->authenticate();

        $persona = Persona::factory()->create();

        $response = $this->deleteJson("/api/personas/{$persona->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('personas', ['id' => $persona->id]);
    }
}

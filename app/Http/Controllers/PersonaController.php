<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonaRequest;
use App\Http\Resources\PersonaResource;
use App\Models\Persona;
use App\Repositories\PersonaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonaController extends Controller
{
    protected $personaRepository;

    public function __construct(PersonaRepository $personaRepository)
    {
        $this->personaRepository = $personaRepository;

        //habilita la autorizacion del policy de manera automatica
        $this->authorizeResource(Persona::class, 'persona');
    }

     /**
     * @group Personas
     * Listar personas
     * @queryParam per_page int Opcional. Cantidad de resultados por página.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 5);
        $personas = $this->personaRepository->paginate($perPage);
        return response()->json(PersonaResource::collection($personas));
    }

    /**
      * @group Personas
      * Crear una nueva persona
      * @bodyParam nombre string requerido. Nombre de la persona.
      * @bodyParam apellido string requerido. Apellido de la persona.
      * @bodyParam edad int requerido. Edad.
      * @bodyParam direccion string Opcional. Dirección.
     * }
     */
    public function store(StorePersonaRequest $request): JsonResponse
    {
         $data = $request->validated();
        $data['user_id'] = auth()->id(); // Asocia la persona al usuario autenticado
        $persona = $this->personaRepository->create($data);

        Log::info("Persona creada", [
            'user_id' => $data['user_id'],
            'persona_id' => $persona->id,
            'nombre' => $persona->nombre
        ]);
        return response()->json(new PersonaResource($persona), 201);
    }

    /**
     * @group Personas
     * Mostrar una persona
     * @urlParam id int requerido. ID de la persona.
     * }
     */
    public function show($id, Persona $persona): JsonResponse
    {
        $persona = $this->personaRepository->find($id);
        return response()->json(new PersonaResource($persona));
    }

    /**
    * @group Personas
    * Actualizar una persona
    * @urlParam id int requerido. ID de la persona.
    * @bodyParam nombre string requerido.
    * @bodyParam apellido string requerido.
    * @bodyParam edad int requerido.
    * @bodyParam direccion string Opcional.
     * }
     */

    public function update(StorePersonaRequest $request, Persona $persona): JsonResponse
    {
        try {
            $updated = $this->personaRepository->update($persona, $request->validated());

            Log::info("Persona actualizada correctamente", [
                'persona_id' => $persona->id,
                'user_id' => $persona->user_id,
                'datos_actualizados' => $request->validated(),
            ]);

            return response()->json(new PersonaResource($updated));
        } catch (\Exception $e) {
            Log::error("Error al actualizar persona", [
                'persona_id' => $persona->id,
                'mensaje' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * @group Personas
     * Eliminar una persona
     * @urlParam id int requerido. ID de la persona.
    */
    public function destroy(Persona $persona): JsonResponse
    {
        try {
            $this->personaRepository->delete($persona);

            Log::info("Persona eliminada correctamente", [
                'persona_id' => $persona->id,
                'user_id' => $persona->user_id,
            ]);

            return response()->json(['message' => 'Persona eliminada correctamente']);
        } catch (\Exception $e) {
            Log::error("Error al eliminar persona", [
                'persona_id' => $persona->id,
                'mensaje' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * @group Personas
     * Obtener una persona con sus mascotas
     * @urlParam id int requerido. ID de la persona.
    */
    public function conMascotas($id): JsonResponse
    {
        try {
            $persona = $this->personaRepository->find($id);
            Log::info("Consulta de persona con mascotas", [
                'persona_id' => $id,
            ]);
            return response()->json(new PersonaResource($persona->load('mascotas')));
        } catch (\Exception $e) {
            Log::error("Error al consultar persona con mascotas", [
                'persona_id' => $id,
                'mensaje' => $e->getMessage(),
            ]);
            throw $e;
        }
    }
}
